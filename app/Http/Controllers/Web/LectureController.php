<?php

namespace App\Http\Controllers\Web;

use App\Models\Lecture;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Part;
use App\Models\Subject;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\LecturePart;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $gradeId = $id - 9;
        $lectures = Lecture::where(['published' => true, 'grade_id' => $gradeId])->orderBy('id', 'desc')->get();
        if (Grade::find($gradeId)) :
            return view("home.grades", compact('lectures'));
        else :
            return abort(404);
        endif;
    }

    public function allLectures()
    {
        return view("admin.lectures", ['lectures'=>Lecture::all()]);
    }

    public function search()
    {
        $search = request()->q ?? '';
        $allFilters = explode(';', request()->filters) ?? "";
        $filters = [];
        foreach ($allFilters as $filter) {
            if (str_starts_with($filter, 'subjects:')) {
                if ($filter != 'subjects:') :
                    foreach (explode(',', str_replace('subjects:', '', $filter)) as $item) :
                        if (trim($item) != '') :
                            $filters['subjects'][] = $item;
                        endif;
                    endforeach;
                endif;
            } elseif (str_starts_with($filter, 'grades:')) {
                if ($filter != 'grades:') :
                    foreach (explode(',', str_replace('grades:', '', $filter)) as $item) :
                        if (trim($item) != '') :
                            $filters['grades'][] = $item;
                        endif;
                    endforeach;
                endif;
            } elseif (str_starts_with($filter, 'lessons:')) {
                if ($filter != 'lessons:') :
                    foreach (explode(',', str_replace('lessons:', '', $filter)) as $item) :
                        if (trim($item) != '') :
                            $filters['lessons'][] = $item;
                        endif;
                    endforeach;
                endif;
            } elseif (str_starts_with($filter, 'parts:')) {
                if ($filter != 'parts:') :
                    foreach (explode(',', str_replace('parts:', '', $filter)) as $item) :
                        if (trim($item) != '') :
                            $filters['parts'][] = $item;
                        endif;
                    endforeach;
                endif;
            } elseif (str_starts_with($filter, 'users:')) {
                if ($filter != 'users:') :
                    foreach (explode(',', str_replace('users:', '', $filter)) as $item) :
                        if (trim($item) != '') :
                            $filters['users'][] = $item;
                        endif;
                    endforeach;
                endif;
            } elseif (str_starts_with($filter, 'price:')) {
                if ($filter != 'price:') :
                    foreach (explode(',', str_replace('price:', '', $filter)) as $item) :
                        if (trim($item) != '') :
                            $filters['price'][] = $item;
                        endif;
                    endforeach;
                endif;
            }
        }


        $data = [
            'lecturesCount' => 0,
            'lectures' => null,
            'queryString' => $search,
            'appliedFilters' => [],
            'filters' => [],
        ];

        $lectures = null;
        if ($search) :
            $grades   = Grade::where('name', 'like', "%$search%")->get();
            $parts    = Part::where('name', 'like', "%$search%")->get();
            $subjects = Subject::where('name', 'like', "%$search%")->get();
            $users    = User::where('name', 'like', "%$search%")->get();
            $lessons  = Lesson::where('title', 'like', "%$search%")->get();
            $lectures  = Lecture::where(['published' => true]);

            // dd($parts);
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


            $pureLectures = clone $lectures;
            if (count($filters)) :
                $gradesFilter = $filters['grades'] ?? "";
                $free = false;
                $hasDiscount = false;
                $Paid = false;
                if (array_key_exists('price', $filters)) :
                    $free = in_array('free', $filters['price']);
                    $hasDiscount = in_array('hasDiscount', $filters['price']);
                    $Paid = in_array('paid', $filters['price']);
                endif;
                $subjectsFilter = $filters['subjects'] ?? "";
                $partsFilter = $filters['parts'] ?? "";
                $usersFilter = $filters['users'] ?? "";

                if ($gradesFilter ? count($gradesFilter) : false) :
                    $lectures->whereIn('grade_id', $gradesFilter);
                endif;

                if ($subjectsFilter ? count($subjectsFilter) : false) :
                    $lectures->whereIn('subject_id', $subjectsFilter);
                endif;

                if ($partsFilter ? count($partsFilter) : false) :
                    $lectures->whereHas('parts', function ($query) use ($partsFilter) {
                        $query->whereIn('part_id', $partsFilter);
                    });
                endif;

                if ($usersFilter ? count($usersFilter) : false) :
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
                // $paginatedLectures = clone $lectures;
                // $paginatedLectures = $paginatedLectures->paginate(6);
                $data = [
                    'lecturesCount' => count($lectures->get()),
                    'lectures' => $lectures,
                    'pureLectures' => $pureLectures,
                    'queryString' => $search,
                    'appliedFilters' => $filters,
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

                return view("home.search", $data);
            endif;
        endif;
        return view("home.search", $data);
    }

    public function myLectures(){
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login');
        }
        $lectures = $user->ownedLectures();
        return view("home.myCourses", compact("lectures"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role->number < 4) :
            return view('admin.addLEcture');
        else :
            return abort(404);
        endif;
    }

    public function viewLecture()
    {
        $slug = request()->slug;
        $user = Auth::user();
        if ($slug && $user) :
            $lecture = Lecture::where(['slug'=> $slug,'published'=>true])->first();
            if ($lecture->owners->contains($user)) :
                return view('Home.lecture_viewer',compact('lecture'));
            else :
                return abort(404);
            endif;
        else :
            return abort(404);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLectureRequest  $request
     * @return \Illuminate\Http\Response
     */
    private function lectureData($request, $fileName = 'poster', $lecture = null)
    {
        $data = $request->all();
        $data['description'] = removeCustomTags($data['description'], ['iframe', 'link', 'script']);
        $poster = $lecture ? $lecture->poster : "";
        if (array_key_exists($fileName, $data)) {
            if ($data[$fileName]) :
                $poster = uploadFile($request, $fileName, $data['title'], $lecture ? $lecture : '');
                if ($poster) {
                    if ($lecture) {
                        $lecture->poster = $poster;
                        $lecture->save();
                    }
                }
            endif;
        }

        $metakeywords = explode(',', $data['metakeywords']);
        $metakeywords = array_unique(array_merge(count($metakeywords) && trim($metakeywords[0]) ? $metakeywords : [], [Auth::user()->name, $data['title'], $data['semester'], Subject::find(env('DEFAULT_SUBJECT_ID'))->name, Grade::find($data['grade'])->name]));

        return [
            'title' => $data['title'],
            'semester' => $data['semester'],
            'short_description' => $data['shortDescription'],
            'description' => $data['description'],
            'published' => array_key_exists('published', $data),
            'promotinal_video_url' => $data['promotinalVideoUrl'],
            'poster' => $poster,
            'meta_keywords' => implode(',', $metakeywords),
            'meta_description' => $data['metaDescription'] ? $data['metaDescription'] : $data['shortDescription'],
            'slug' => $data['slug'],
            'price' => array_key_exists('free', $data)  ? 0 : abs($data['price']),
            'final_price' =>  array_key_exists('free', $data)  ? 0 : (array_key_exists('hasDiscount', $data) ? ($data['discountExpiryDate'] > now() ? (abs($data['finalPrice']) > abs($data['price']) ? abs($data['finalPrice']) : abs($data['price'])) : abs($data['price'])) : abs($data['price'])),
            'discount_expiry_date' => $data['discountExpiryDate'] > now() ? $data['discountExpiryDate'] : null,
            'grade_id' => $data['grade'],
            'time' => 0,
            'total_questions_count' => 0,
            'subject_id' => Subject::find(env('DEFAULT_SUBJECT_ID'))->id,
            'user_id' => Auth::id(),
        ];
    }

    public function store(StoreLectureRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        // $this->validator($data)->validate();
        if ($data['price'] >= $data['finalPrice'] || array_key_exists('free', $data)) :
            $lecture = $user->createdLectures()->create($this->lectureData($request));
            $parts = [];
            foreach ($data['parts'] as $part) :
                if (intval($part)) :
                    $parts[] = LecturePart::firstOrCreate([
                        'lecture_id' => $lecture->id,
                        'part_id' => $part
                    ]);
                endif;
            endforeach;
        else :
            return redirect()->beck();
        endif;
        if ($lecture) {
            return redirect(route('lectures.edit', $lecture->slug))->with('lecture', $lecture);
        } else {
            return redirect()->beck();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $lecture = Lecture::where(['slug'=> $slug,'published'=>true])->first();
        if ($lecture) :
            return view("home.lectureDetails", compact('lecture'));
        else :
            return abort(404);
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $lecture = Lecture::where(['slug'=> $slug,'published'=>true])->first();
        if ($lecture) :
            return view("admin.editLecture", compact('lecture'));
        else :
            return abort(404);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLectureRequest  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLectureRequest $request, $slug)
    {
        $data = $request->all();
        $lecture = Lecture::where(['slug'=> $slug,'published'=>true])->first();

        if ($data['price'] >= $data['finalPrice'] || $data['free']) {
            $lecture->update($this->lectureData($request, 'poster', $lecture));
            foreach (LecturePart::where(['lecture_id' => $lecture->id])->get() as $part) {
                if (!in_array($part->part_id, $data['parts'])) {
                    $part->delete();
                }
            }
            foreach ($data['parts'] as $part) {
                if (!empty($part)) {
                    LecturePart::firstOrCreate([
                        'lecture_id' => $lecture->id,
                        'part_id' => $part
                    ]);
                }
            }
        } else {
            return redirect()->back();
        }
        if ($lecture) {
            return redirect(route('lectures.edit', $lecture->slug))->with('lecture', $lecture);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        //
    }
}
