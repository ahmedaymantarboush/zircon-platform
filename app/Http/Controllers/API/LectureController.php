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
use App\Models\Lesson;
use App\Models\Part;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gradeId)
    {
        $id = $gradeId - 9;
        $lectures = Lecture::where(['published' => true, 'grade_id' => $id])->orderBy('id', 'desc')->get();
        if (count($lectures)) :
            return apiResponse(true, _('هناك محاضرات موجودة'), LectureCollection::only($lectures, ['title', 'shortDescription', 'poster', 'time', 'totalQuestionsCount', 'slug', 'price', 'finalPrice', 'discountExpiryDate']));
        else :
            return apiResponse(false, _('لا يوجد محاضرات'), [], 401);
        endif;
    }

    public function search(Request $request)
    {
        $unactivatedFilters = ['users', 'subjects'];

        $jsonRequest = json_decode($request->data, true);

        $search = $jsonRequest['q'] ?? '';
        $filters = $jsonRequest['filters'] ?? [];

        if ($search) :
            $grades   = Grade::where('name', 'like', "%$search%")->get();
            $parts    = Part::where('name', 'like', "%$search%")->get();
            $subjects = Subject::where('name', 'like', "%$search%")->get();
            $users    = User::where('name', 'like', "%$search%")->get();
            $lessons  = Lesson::where('title', 'like', "%$search%")->get();
            $lectures  = Lecture::where(['published' => true]);
            $lectures = $lectures->where(function ($q) use ($search, $users, $parts, $grades, $lessons, $subjects) {
                $q->where('title', 'LIKE', "%$search%")
                    ->orWhere('semester', 'LIKE', "%$search%")
                    ->orWhere('short_description', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->orWhere('slug', 'LIKE', "%$search%")
                    ->orWhere('meta_keywords', 'LIKE', "%$search%")
                    ->orWhere(function ($userQ) use ($users) {
                        $userQ->whereHas('publisher', function ($user) use ($users) {
                            $user->whereIn('id', $users->pluck('id'));
                        });
                    })->orWhere(function ($partQ) use ($parts) {
                        $partQ->whereHas('parts', function ($part) use ($parts) {
                            $part->whereIn('part_id', $parts->pluck('id'));
                        });
                    })->orWhere(function ($gradeQ) use ($grades) {
                        $gradeQ->whereHas('grade', function ($grade) use ($grades) {
                            $grade->whereIn('id', $grades->pluck('id'));
                        });
                    })->orWhere(function ($subjectQ) use ($subjects) {
                        $subjectQ->whereHas('subject', function ($subject) use ($subjects) {
                            $subject->whereIn('id', $subjects->pluck('id'));
                        });
                    })->orWhere(function ($lessonQ) use ($lessons) {
                        $lessonQ->whereHas('lessons', function ($lesson) use ($lessons) {
                            $lesson->whereIn('id', $lessons->pluck('id'));
                        });
                    });
            });

            if (count($filters)) :
                $gradesFilter = $filters['grades'];
                $free = false;
                $hasDiscount = false;
                $Paid = false;
                if (array_key_exists('price', $filters)) :
                    $free = array_key_exists('free', $filters['price']) ? $filters['price']['free'] : false;
                    $hasDiscount = array_key_exists('hasDiscount', $filters['price']) ? $filters['price']['hasDiscount'] : false;
                    $Paid = array_key_exists('paid', $filters['price']) ? $filters['price']['paid'] : false;
                endif;
                $subjectsFilter = $filters['subjects'] ?? "";
                $partsFilter = $filters['parts'] ?? "";
                $usersFilter = $filters['users'] ?? "";

                if (count($gradesFilter)) :
                    $lectures->whereIn('grade_id', $gradesFilter);
                endif;

                if (count($subjectsFilter)) :
                    $lectures->whereIn('subject_id', $subjectsFilter);
                endif;

                if (count($partsFilter)) :
                    $lectures->whereHas('parts', function ($query) use ($partsFilter) {
                        $query->whereIn('part_id', $partsFilter);
                    });
                endif;

                if (count($usersFilter)) :
                    $lectures->whereIn('user_id', $usersFilter);
                endif;

                $lectures->where(function ($q) use ($free, $hasDiscount, $Paid) {
                    if ($free) :
                        $q->orWhere('price', 0);
                    endif;
                    if ($hasDiscount) :
                        $q->orWhere('discount_expiry_date', '>', now());
                    endif;
                    if ($Paid) :
                        $q->orWhere('price', '>', 0);
                    endif;
                });
            endif;

            if ($lectures->count()) :
                $paginatedLectures = clone $lectures;
                $paginatedLectures = $paginatedLectures->paginate(6);

                $filtersUrl = '';
                foreach ($filters as $key => $value) {
                    if (!in_array($key, $unactivatedFilters)) :
                        $filtersUrl .= $key . ':' . implode(',', $value) . ';';
                    endif;
                }
                $data = [
                    'lecturesCount' => count($lectures->get()),
                    'lectures' => LectureCollection::only($paginatedLectures, ['title', 'shortDescription', 'poster', 'time', 'totalQuestionsCount', 'slug', 'finalPrice', 'grade', 'gradeId']),
                    'queryString' => $search,
                    'appliedFilters' => $filters,
                    'appliedFiltersUrl' => $filtersUrl,
                    'filters' => [
                        'grades' => $grades->pluck('id'),
                        'price' => [
                            'free' => $free ?? false,
                            'hasDiscount' => $hasDiscount ?? false,
                            'Paid' => $Paid ?? false
                        ],
                        'parts' => $parts->pluck('id'),
                        'subjects' => $subjects->pluck('id'),
                        'users' => $users->pluck('id'),
                    ],
                ];

                $query = "&q=$search";
                $query .= $filtersUrl ? "&&filters=$filtersUrl" : "";

                if ($paginatedLectures->lastPage() > 1) :
                    $data['pagination'] = [
                        "query" => $query,
                        "firsPage" => 1,
                        "firsPageUrl" => $paginatedLectures->url(1),
                        "currentPage" => $paginatedLectures->currentPage(),
                        "lastPage" => $paginatedLectures->lastPage(),
                        "lastPageUrl" => $paginatedLectures->url($paginatedLectures->lastPage()),
                        "links" => $paginatedLectures->links(),
                        "nextPageUrl" => $paginatedLectures->nextPageUrl(),
                        "prevPageUrl" => $paginatedLectures->previousPageUrl(),
                        "path" => $paginatedLectures->path(),
                        "total" => $paginatedLectures->total(),
                    ];
                endif;
                return apiResponse(true, _('تم العثور على محاضرات'), $data);
            else :
                return apiResponse(false, _('لا يوجد نتائج'), [], 404);
            endif;
        else :
            return apiResponse(false, _('لا يوجد جملة بحث'), [], 404);
        endif;
    }

    public function canBuy(Request $request)
    {
        $jsonRequest = $request->json();
        $slug = $jsonRequest['lecture'];

        $lecture = Lecture::where('slug', $slug)->first();
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;
        if (!$lecture) :
            return apiResponse(false, _('المحاضرة المطلوبة غير موجودة'), [], 404);
        endif;

        if ($user->balance < getPrice($lecture)) :
            return apiResponse(false, _("الرصيد الحالي ($user->balance ج.م) لا يكفي لاتمام عملية الشراء"), [], 401);
        elseif ($user->balance < getPrice($lecture)) :
            return apiResponse(true, _('الرصيد كافي لاتمام عملية الشراء'), [
                "price" => getPrice($lecture),
                "balance" => $user->balance,
            ], 200);
        endif;
    }

    public function buy(Request $request)
    {
        $jsonRequest = $request->json();

        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 403);
        endif;

        $slug = $jsonRequest['lecture'];
        $lecture = Lecture::where('slug', $slug)->first();
        if (!$lecture) :
            return apiResponse(false, _('المحاضرة المطلوبة غير موجودة'), [], 404);
        endif;
        $price = getPrice($lecture);

        $balance = $user->balance;
        if ($balance < $price) :
            return apiResponse(false, _("الرصيد الحالي ($balance ج.م) لا يكفي لاتمام عملية الشراء"), [], 401);

        elseif ($balance >= $price) :

            $user->balance = $balance - $price;
            if ($user->save()) :
                if ($user->ownedLectures()->create(['lecture_id' => $lecture->id])) :
                    return apiResponse(true, _("تمت عملية الشراء بنجاح"), [
                        "price" => $price,
                        "balance" => $user->balance,
                    ], 200);
                endif;
            endif;
        endif;
        return apiResponse(false, _("حدث خطأ أثناء الشراء يرجى المحاولة مرة أخرى"), [
            "price" => $price,
            "balance" => $user->balance,
        ], 500);
    }

    public function lastLectures()
    {
        $grade3 = Lecture::with('publisher')->where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 3])->get();
        $lectures = [
            1 => Lecture::with('publisher')->where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 1])->first(),
            2 => Lecture::with('publisher')->where('published', true)->orderBy('id', 'desc')->where(['grade_id' => 2])->first(),
            3 => $grade3[0],
            4 => count($grade3) > 1 ? $grade3[1] : null,
        ];
        foreach ($lectures as $key => $lecture) {
            if ($lecture) {
                $lectures[$key] = LectureResource::only($lecture, ['title', 'poster', 'lessonsCount', 'slug', 'price', 'finalPrice', 'discountExpiryDate', 'gradeId', 'grade', 'ownersCount']);
            } else {
                $lectures[$key] = null;
            }
        }
        if ($lectures) {
            return apiResponse(true, _('هناك محاضرات موجودة'), $lectures);
        } else {
            return apiResponse(false, _('لا يوجد محاضرات'), [], 404);
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
        $data = json_decode($request->data, true);

        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;

        $data['description'] = removeCustomTags($data['description'], ['iframe', 'link', 'script']);
        $poster = '';
        if (array_key_exists('poster', $request->all())) {
            $poster = uploadFile($request, $fileName, $data['title'], $oldFile ? $oldFile : '');
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
            'short_description' => $data['shortDescription'],
            'description' => $data['description'],
            'published' => $data['published'],
            'promotinal_video_url' => $data['promotinalVideoUrl'],
            'poster' => $poster,
            'meta_keywords' => $data['meteKeywords'] . apiUser()->name . ',' . $data['title'] . ',' . $data['semester'] . ',' . Subject::find(env('DEFAULT_SUBJECT_ID'))->name . ',' . Grade::find($data['grade'])->name,
            'meta_description' => $data['metaDescription'] ? $data['metaDescription'] : $data['shortDescription'],
            'slug' => $data['slug'],
            'price' => $data['free'] ? 0 : abs($data['price']),
            'final_price' =>  $data['free'] ? 0 : ($data['hasDiscount'] ? (abs($data['finalPrice']) > abs($data['price']) ? abs($data['finalPrice']) : abs($data['price'])) : abs($data['price'])),
            'discount_expiry_date' => $data['discountExpiryDate'] > now() ? $data['discountExpiryDate'] : null,
            'grade_id' => $data['grade'],
            'time' => '0 ساعة',
            'total_questions_count' => 0,
            'subject_id' => Subject::find(env('DEFAULT_SUBJECT_ID'))->name,
            'user_id' => apiUser()->id,
        ];
    }

    public function store(StoreLectureRequest $request)
    {
        $data = json_decode($request->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;

        if (floatval($data['price']) > floatval($data['finalPrice']) || $data['free']) :
            if ($user->role->name == 'Admin' || $user->role->name == 'Super Admin' || $user->role->name == 'Teacher') :
                $lecture = $user->createdLectures()->create($this->lectureData($request));
                $parts = [];
                foreach ($data['parts'] as $part) :
                    if (!empty($part)) :
                        $parts[] = LecturePart::firstOrCreate([
                            'lecture_id' => $lecture->id,
                            'part_id' => $part
                        ]);
                    endif;
                endforeach;
                if (count($parts) == 0) :
                    $lecture->forceDelete();
                    return apiResponse(false, _('لم يتم اضافة الأجزاء الدراسية للمحاضرة لذلك لم يكتمل انشاء المحاضرة'), [], 401);
                endif;
            else :
                return apiResponse(false, _('غير مصرح لهذا المسخدم بانشاء محاضرة جديدة'), [], 403);
            endif;
        else :
            $status = (floatval($data['finalPrice']) > floatval($data['price'])) ? 'أكبر من' : 'يساوي';
            return apiResponse(false, _("السعر بعد الخصم $status السعر الأساسي"), [], 400);
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
            return apiResponse(true, _('تم العثور على المحاضرة بنجاح'), LectureResource::only($lecture, ['title', 'shortDescription', 'description', 'publisherName', 'updatedAt', 'sections', 'promotinalVideoUrl', 'poster', 'price', 'finalPrice', 'discountExpiryDate', 'time', 'totalQuestionsCount']));
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
        $jsonRequest = $request->json();

        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $data = $jsonRequest->all();
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
