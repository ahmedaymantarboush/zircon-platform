<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Resources\LectureCollection;
use App\Http\Resources\LectureResource;
use App\Models\Grade;
use App\Models\Lecture;
use App\Models\LecturePart;
use App\Models\Subject;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('auth:sanctum')->except(['index', 'lastLectures','show']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gradeId)
    {
        $id = $gradeId - 9;
        $lectures = Lecture::where(['published' => true, 'grade_id' => $id])->orderBy('id','desc')->get();
        if (count($lectures)):
            return apiResponse(true, _('هناك محاضرات موجودة'), LectureCollection::only($lectures, ['title','shortDescription','poster','time','totalQuestionsCount','slug','price','finalPrice','discountExpiryDate']));
        else :
            return apiResponse(false, _('لا يوجد محاضرات'), [], 401);
        endif;
    }

    public function lastLectures()
    {
        // $lecture = ["title": "Test Lecture 1","lessonsCounr": 0,"poster": "","slug": "test-lecture-3","price": 0,"finalPrice": 0,"discountExpiryDate": "2022-08-03","gradeId": 1,"grade": "الصف الأول الثانوي"]
        $grade3 = Lecture::with('owner')->where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 3])->get();
        $lectures = [
            1 => Lecture::with('owner')->where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 1])->first(),
            2 => Lecture::with('owner')->where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 2])->first(),
            3 => $grade3[0],
            4 => count($grade3) > 1 ? $grade3[1] : null,
        ];
        foreach ($lectures as $key => $lecture) {
            if ($lecture) {
                $lectures[$key] = LectureResource::only($lecture, ['title', 'poster', 'lessonsCount', 'slug', 'price', 'finalPrice', 'discountExpiryDate', 'gradeId', 'grade','ownersCount']);
            } else {
                $lectures[$key] = null;
            }
        }
        if ($lectures) {
            return apiResponse(true, _('هناك محاضرات موجودة'), $lectures);
        } else {
            return apiResponse(false, _('لا يوجد محاضرات'), [], 401);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function lectureData(Request $request, $fileName = 'poster', $oldFile = null)
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;

        $data = $request->all();
        $data['description'] = removeCustomTags($data['description'], ['iframe', 'link', 'script']);
        $poster = '';
        if (array_key_exists('poster', $data)) {
            $poster = uploadFile($request, $fileName, $oldFile ? $oldFile : '');
            if ($poster) {
                if ($oldFile) {
                    $oldFile->poster = $poster;
                    $oldFile->save();
                }
            } else {
                return apiResponse(false, _('حدث خطأ أثناء رفع الصورة'), [], 400);
            }
        }

        return [
            'title' => $data['title'],
            'semester' => $data['semester'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'published' => array_key_exists('published', $data),
            'promotinal_video_url' => $data['promotinal_video_url'],
            'poster' => $poster,
            'meta_keywords' => $data['mete_keywords'] . apiUser()->name . ',' . $data['title'] . ',' . $data['semester'] . ',' . Subject::find(env('DEFAULT_SUBJECT_ID'))->name . ',' . Grade::find($data['grade'])->name,
            'meta_description' => $data['meta_description'] ? $data['meta_description'] : $data['short_description'],
            'slug' => $data['slug'],
            'price' => array_key_exists('free', $data) ? 0 : abs($data['price']),
            'final_price' =>  array_key_exists('free', $data) ? 0 : (array_key_exists('has_discount', $data) ? abs($data['final_price']) : abs($data['price'])),
            'discount_expiry_date' => $data['discount_expiry_date'] ? $data['discount_expiry_date'] : now(),
            'grade_id' => $data['grade'],
        ];
    }

    public function store(StoreLectureRequest $request)
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $data = $request->all();
        if ($data['price'] >= $data['final_price'] || $data['free']) :
            if ($user->role->name == 'Admin' || $user->role->name == 'Super Admin' || $user->role->name == 'Teacher') :
                $lecture = $user->createdLectures()->create($this->lectureData($request));
                foreach ($data['parts'] as $part) :
                    $parts = [];
                    if (!empty($part)) :
                        $parts[] = LecturePart::firstOrCreate([
                            'lecture_id' => $lecture->id,
                            'part_id' => $part
                        ]);
                    endif;
                endforeach;
                if (!$parts) :
                    $lecture->forceDelete();
                    return apiResponse(false, _('لم يتم اضافة الأجزاء الدراسية للمحاضرة لذلك لم يكتمل انشاء المحاضرة'), [], 401);
                endif;
            else :
                return apiResponse(false, _('غير مصرح لهذا المسخدم بانشاء محاضرة جديدة'), [], 403);
            endif;
        else :
            return apiResponse(false, _('السعر بعد الخصم أكبر من السعر الأساسي'), [], 400);
        endif;
        if ($lecture) :
            return apiResponse(true, _('تم انشاء المحاضرة بنجاح'), new LectureResource($lecture));
        else :
            return apiResponse(false, _('حدث خطأ اثناء انشاء المحاضرة'), [], 500);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $lecture = Lecture::where('slug', $slug)->first();
        if ($lecture) :
            $data = [
                'lecture' => new LectureResource($lecture),
                'owner' => false,
            ];
            if (apiUser()) :
                $data['owner'] = apiUser()->ownedLectures->contains($lecture);
            endif;
            return apiResponse(true, _('تم العثور على المحاضرة بنجاح'), $data);
        else :
            return apiResponse(false, _('لم يتم العثور على المحاضرة'), [], 400);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLectureRequest $request, $slug)
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $data = $request->all();
        $lecture = apiUser()->createdLectures()->where('slug', $slug)->first();
        if (!$lecture) :
            return apiResponse(false, _('هذه المحاضرة غير موجودة'), [], 400);
        endif;
        if ($request->slug != $lecture->slug && count(Lecture::where('slug', $request->slug)->get())) :
            return apiResponse(false, _('هذا الslug متاح في محاضرة أخرى الرجاء إعادة اختيار slug مناسب'), ["slug" => ['هذا الslug متاح في محاضرة أخرى الرجاء إعادة اختيار slug مناسب']], 422);
        endif;
        if ($data['price'] >= $data['final_price'] || $data['free']) :
            if ($user->role->name == 'Admin' || $user->role->name == 'Super Admin' || $user->role->name == 'Teacher') :
                $lecture->update($this->lectureData($request, 'poster', $lecture));
                foreach (LecturePart::where(['lecture_id' => $lecture->id])->get() as $part) :
                    if (!in_array($part->part_id, $data['parts'])) :
                        $part->delete();
                    endif;
                endforeach;
                $parts = [];
                foreach ($data['parts'] as $part) :
                    if (!empty($part)) :
                        $parts[] = LecturePart::firstOrCreate([
                            'lecture_id' => $lecture->id,
                            'part_id' => $part
                        ]);
                    endif;
                endforeach;
                if (!$parts) :
                    return apiResponse(false, _('لم يتم تعديل الأجزاء الدراسية بشكل صحيح'), [], 400);
                endif;
            else :
                return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل هذا المحاضرة'), [], 403);
            endif;
        else :
            return apiResponse(false, _('السعر بعد الخصم أكبر من السعر الأساسي'), [], 400);
        endif;

        return apiResponse(true, _('تم تعديل المحاضرة بنجاح'), new LectureResource($lecture));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;

        $lecture = apiUser()->createdLectures()->where('slug', $slug)->first();
        if (!$lecture) :
            return apiResponse(false, _('هذه المحاضرة غير موجوده'), [], 403);
        endif;
        if ($lecture->delete()) :
            return apiResponse(true, _('تم حذف المحاضرة بنجاح'), []);
        else :
            return apiResponse(false, _('حدث خطأ ما ولم يتم حذف المحاضرة'), [], 500);
        endif;
    }
}
