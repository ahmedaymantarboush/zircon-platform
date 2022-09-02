<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonCollection;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\SectionItem;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return apiResponse(true, _(''), LessonCollection::only($lessons, []));
    }

    public function fastEdit()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return apiResponse(false, _('لم يتم العثور على الدرس'), [], 404);
        endif;
        if ($lesson->publisher->id != $user->id) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الدرس'), [], 403);
        endif;
        return apiResponse(true, _('تم العثور على الدرس'), [
            'title' => $lesson->title,
            'shortDescription' => $lesson->short_description,
            'description' => $lesson->description,
            'type' => $lesson->type,
            'grade' => $lesson->grade_id,
            'part' => ['id'=>$lesson->part_id,'name'=>$lesson->part->name],
            'free' => $lesson->price == 0,
            'url' => $lesson->url,
            'section' => SectionItem::where('lesson_id', $id)->first()->section->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return apiResponse(false, _('لم يتم العثور على الدرس'), [], 404);
        endif;
        if ($lesson->publisher->id != $user->id) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الدرس'), [], 403);
        endif;

        validator()->make($data,[
            'title' => ['required', 'string', 'max:50'],
            'url' => ['required', 'url', 'max:255'],
            'type' => ['string', "in:video,pdf,audio"],
            'description' => ['required', 'string'],
            'section' => ['required', 'exists:sections,id'],
            'part' => ['required', 'exists:parts,id'],
        ], [
            'title.required' => 'عنوان الدرس مطلوب',
            'title.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'title.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'url.required' => 'الرجاء التأكد من أنك قمت باختيار ملف صالح',
            'url.url' => 'الرجاء التأكد من أنك قمت الرابط بشكل صحيح',
            // 'url.max' => 'رجاءًا قم باختيار ملف أقل من 1 جيجا',

            'type.string' => 'يجب أن يكون نوع الملف عبارة عن نص',
            'type.in' => 'الرجاء إختيار نوع ملف صحيح',

            'semester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'semester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'description.required' => 'وصف الدرس مطلوب',
            'description.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'section.required' => 'القسم التابع له الدرس مطلوب',
            'section.exists' => 'الرجاء إختيار قسم صحيح',

            'part.required' => 'الجزئية الدراسية مطلوبة',
            'part.exists' => 'الرجاء اختيار جزئية دراسية صحيحة',
        ]);


        $section = Section::find($data['section']);
        if (!$section) :
            return apiResponse(false, _('الرجاء التأكد من القسم التابع له الدرس'), [], 404);
        endif;

        $lecture = $section->lecture;
        $time = getDuration($data['url']);

        $lesson = new Lesson();
        $lesson->title = $data['lessonTitle'];
        $lesson->url = getEmbedVideoUrl($data['url']);
        $lesson->time = $time;
        $lecture->time += $time;
        $lesson->grade_id =  $lecture->grade->id;
        $lesson->type = 'video';
        $lesson->semester = $lecture->semester;
        $lesson->subject_id = $lecture->subject->id;
        $lesson->lecture_id = $lecture->id;
        $lesson->part_id = $data['lessonPart'];
        $lesson->description = $data['description'];

        if (array_key_exists('dependsOnExam', $data)) {
            $lesson->exam_id = $data['exam'];
            $lesson->min_percentage =  $data['percentage'];
        }

        $lesson->save();
        $lecture->save();
        if ($lesson) {
            SectionItem::create([
                'title' => $lesson->title,
                'lesson_id' => $lesson->id,
                'order' => count($section->items) + 1,
                'section_id' => $section->id,
            ]);
        }
        return apiResponse(true, _('تم إضافة الدرس بنجاح'), [
            'id' => $lesson->id,
            'title' => $lesson->title,
            'url' => $lesson->url,
            'time' => $lesson->time,
            'type' => $lesson->type,
            'description' => $lesson->description,
            'section' => $lesson->section->id,
            'part' => $lesson->part->id,
            'exam' => $lesson->exam_id,
            'percentage' => $lesson->min_percentage,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return apiResponse(false, _('لم يتم العثور على الدرس'), [], 404);
        endif;
        if (!$lesson->lecture->owners->contains($user)) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض الدرس'), [], 403);
        endif;
        $urls = getVideoUrl(getVideoId($lesson->url));
        return apiResponse(true, _('تم العثور على الدرس'), [
            'title' => $lesson->title,
            'exam' => $lesson->exam_id,
            'grade' => $lesson->grade->name,
            'part' => $lesson->part->name,
            'description' => $lesson->description,
            'urls' => count($urls) ? $urls : $lesson->url
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return apiResponse(false, _('لم يتم العثور على الدرس'), [], 404);
        endif;
        if ($lesson->publisher->id != $user->id) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الدرس'), [], 403);
        endif;

        validator()->make($data,[
            'title' => ['required', 'string', 'max:50'],
            'url' => ['required', 'url', 'max:255'],
            'type' => ['string', "in:video,pdf,audio"],
            'description' => ['required', 'string'],
            'section' => ['required', 'exists:sections,id'],
            'part' => ['required', 'exists:parts,id'],
        ], [
            'title.required' => 'عنوان الدرس مطلوب',
            'title.string' => 'يجب أن يكون العنوان عبارة عن نص',
            'title.max' => 'أكبر عدد من الحروف هو 50 حرف',

            'url.required' => 'الرجاء التأكد من أنك قمت باختيار ملف صالح',
            'url.url' => 'الرجاء التأكد من أنك قمت الرابط بشكل صحيح',
            // 'url.max' => 'رجاءًا قم باختيار ملف أقل من 1 جيجا',

            'type.string' => 'يجب أن يكون نوع الملف عبارة عن نص',
            'type.in' => 'الرجاء إختيار نوع ملف صحيح',

            'semester.string' => 'يجب أن يكون الفصل الدراسي عبارة عن نص',
            'semester.in' => 'الرجاء إختيار فصل دراسي صحيح',

            'description.required' => 'وصف الدرس مطلوب',
            'description.string' => 'يجب أن يكون الوصف عبارة عن نص',

            'section.required' => 'القسم التابع له الدرس مطلوب',
            'section.exists' => 'الرجاء إختيار قسم صحيح',

            'part.required' => 'الجزئية الدراسية مطلوبة',
            'part.exists' => 'الرجاء اختيار جزئية دراسية صحيحة',
        ])->validate();


        $section = SectionItem::where(['lesson_id' => $lesson->id])->first()->section;
        $lecture = $section->lecture;
        $time = getDuration($data['url']);

        $lesson->title = $data['title'];
        $lesson->url = getEmbedVideoUrl($data['url']);
        $lecture->time -= $lesson->time;
        $lesson->time = $time;
        $lecture->time += $time;
        $lesson->grade_id =  $lecture->grade->id;
        $lesson->type = 'video';
        $lesson->semester = $lecture->semester;
        $lesson->subject_id = $lecture->subject->id;
        $lesson->part_id = $data['part'];
        $lesson->description = $data['description'];

        if (array_key_exists('dependsOnExam', $data)) :
            $lesson->exam_id = $data['exam'];
            $lesson->min_percentage =  $data['percentage'];
        else :
            $lesson->exam_id = null;
            $lesson->min_percentage = null;
        endif;

        $sectionItem = SectionItem::where(['section_id' => $section->id, 'lesson_id' => $lesson->id])->first();
        $sectionItem->lesson_id = $lesson->id;
        $sectionItem->section_id = $section->id;

        $sectionItem->save();
        $lesson->save();
        $lecture->save();
        return apiResponse(true, _('تم تعديل الدرس بنجاح'), [
            'id' => $lesson->id,
            'title' => $lesson->title,
            'url' => $lesson->url,
            'type' => $lesson->type,
            'semester' => $lesson->semester,
            'subject' => $lesson->subject->name,
            'grade' => $lesson->grade->name,
            'part' => $lesson->part->name,
            'description' => $lesson->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = apiUser();
        $data = request()->validate([
            'id' => ['required', 'exists:lessons,id'],
        ], [
            'id.required' => 'الرجاء التأكد من أنك قمت باختيار الدرس',
            'id.exists' => 'الرجاء التأكد من أنك قمت باختيار الدرس',
        ]);
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return apiResponse(false, _('لم يتم العثور على الدرس'), [], 404);
        endif;
        if ($lesson->publisher->id != $user->id) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بحذف الدرس'), [], 403);
        endif;
        $sectionItem = SectionItem::where(['section_id' => $lesson->section->id, 'lesson_id' => $lesson->id])->first();
        $sectionItem->delete();
        $lesson->delete();
        return apiResponse(true, _('تم حذف الدرس بنجاح'),[]);
    }
}
