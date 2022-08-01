<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MonthRequest;
use App\Http\Requests\UpdateMonthRequest;
use App\Http\Resources\MonthCollection;
use App\Http\Resources\MonthResource;
use App\Models\Month;
use App\Models\MonthPart;
use App\Models\Subject;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Month::where('published', true)->orderBy('id', 'desc')->paginate(10);
        if ($months) {
            return apiResponse(true, _('هناك شهور موجودة'), new MonthCollection($months));
        } else {
            return apiResponse(false, _('لا يوجد شهور'), [], 401);
        }
    }

    public function lastMonths()
    {
        $months = [
            1 => Month::where(['grade_id' => 1, 'published' => true])->orderBy('id', 'desc')->first(),
            2 => Month::where(['grade_id' => 2, 'published' => true])->orderBy('id', 'desc')->first(),
            3 => Month::where(['grade_id' => 3, 'published' => true])->orderBy('id', 'desc')->first(),
        ];
        if ($months) {
            return apiResponse(true, _('هناك شهور موجودة'), new MonthCollection($months));
        } else {
            return apiResponse(false, _('لا يوجد شهور'), [], 401);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function lectureData(Request $request, $fileName = 'poster', $oldFile = null)
    {
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
            'meta_keywords' => $data['mete_keywords'] . auth('sanctum')->user()->name . ',' . $data['title'] . ',' . $data['semester'] . ',' . Subject::find($data['subject']) . ',' . Subject::find($data['grade']),
            'meta_description' => $data['meta_description'] ? $data['meta_description'] : $data['short_description'],
            'slug' => $data['slug'],
            'price' => array_key_exists('free', $data) ? 0 : abs($data['price']),
            'final_price' =>  array_key_exists('free', $data) ? 0 : (array_key_exists('has_discount', $data) ? abs($data['new_price']) : abs($data['price'])),
            'discount_expiry_date' => $data['discount_expiry_date'] ? $data['discount_expiry_date'] : now(),
            'subject_id' => $data['subject'],
            'grade_id' => $data['grade'],
        ];
    }

    public function store(MonthRequest $request)
    {
        $data = $request->all();
        if ($data['price'] >= $data['final_price'] || $data['free']) :
            $user = auth('sanctum')->user();
            if ($user->role->name == 'Admin' || $user->role->name == 'Super Admin' || $user->role->name == 'Teacher') :
                $month = $user->createdMonths()->create($this->lectureData($request));
                foreach ($data['part'] as $part) :
                    $parts = [];
                    if (!empty($part)) :
                        $parts[] = MonthPart::firstOrCreate([
                            'month_id' => $month->id,
                            'part_id' => $part
                        ]);
                    endif;
                endforeach;
                if (!$parts) :
                    $month->forceDelete();
                    return apiResponse(false, _('لم يتم اضافة الأجزاء الدراسية للشهر لذلك لم يكتمل انشاء الشهر'), [], 401);
                endif;
            else :
                return apiResponse(false, _('غير مصرح لهذا المسخدم بانشاء شهر جديد'), [], 400);
            endif;
        else :
            return apiResponse(false, _('السعر بعد الخصم أكبر من السعر الأساسي'), [], 400);
        endif;
        if ($month) :
            return apiResponse(true, _('تم انشاء الشهر بنجاح'), new MonthResource($month));
        else :
            return apiResponse(false, _('حدث خطأ اثناء انشاء الشهر'), [], 500);
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
        $month = Month::where('slug', $slug)->first();
        if ($month) :
            return apiResponse(true, _('تم العثور على الشهر بنجاح'), new MonthResource($month));
        else :
            return apiResponse(false, _('لم يتم العثور على الشهر'), [], 400);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonthRequest $request, $slug)
    {
        $data = $request->all();
        $month = auth('sanctum')->user()->createdMonths()->where('slug', $slug)->first();
        if (!$month):
            return apiResponse(false, _('هذا الشهر غير موجود'), [], 400);
        endif;
        if ($data['price'] >= $data['new_price'] || $data['free']) :
            $month->update($this->lectureData($request, 'poster', $month));
            foreach (MonthPart::where(['lecture_id' => $month->id])->get() as $part) :
                if (!in_array($part->part_id, $data['part'])) :
                    $part->delete();
                endif;
            endforeach;
            $parts = [];
            foreach ($data['part'] as $part) :
                if (!empty($part)) :
                    $parts[] = MonthPart::firstOrCreate([
                        'lecture_id' => $month->id,
                        'part_id' => $part
                    ]);
                endif;
            endforeach;
            if (!$parts) :
                return apiResponse(false, _('لم يتم تعديل الأجزاء الدراسية بشكل صحيح'), [], 400);
            endif;
        else :
            return apiResponse(false, _('السعر بعد الخصم أكبر من السعر الأساسي'), [], 400);
        endif;

        return apiResponse(true, _('تم تعديل الشهر بنجاح'), new MonthResource($month));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $month = auth('sanctum')->user()->createdMonths()->where('slug', $slug)->first();
        if (!$month):
            return apiResponse(false, _('هذا الشهر غير موجود'), [], 400);
        endif;
        if ($month->delete()):
            return apiResponse(true, _('تم حذف الشهر بنجاح'), []);
        else:
            return apiResponse(false, _('حدث خطأ ما ولم يتم حذف الشهر'), [], 500);
        endif;
    }
}
