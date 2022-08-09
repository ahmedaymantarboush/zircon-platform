<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Part;
use App\Models\Subject;
use App\Models\User;

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

    public function search()
    {
        $search = request()->q;

        $grades   = Grade::where('name', 'like', "%$search%")->get();
        $parts    = Part::where('name', 'like', "%$search%")->get();
        $subjects = Subject::where('name', 'like', "%$search%")->get();
        $users    = User::where('name', 'like', "%$search%")->get();
        $lessons  = Lesson::where('title', 'like', "%$search%")->get();
        $lectures  = $search ? Lecture::where(['published' => true]) : null;

        if ($search) :
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

        // if ($filters) :
        //     $gradesFilter = in_array('grades',$filters) ? ;

        //     if (array_key_exists('price', $filters)) :
        //         $free = array_key_exists('free', $filters['price']) ? $filters['price']['free'] : false;
        //         $hasDiscount = array_key_exists('hasDiscount', $filters['price']) ? $filters['price']['hasDiscount'] : false;
        //         $Paid = array_key_exists('paid', $filters['price']) ? $filters['price']['paid'] : false;
        //     else :
        //         $free = false;
        //         $hasDiscount = false;
        //         $Paid = false;
        //     endif;
        //     $subjectsFilter = in_array('subjects',$filters);
        //     $partsFilter = in_array('parts',$filters);
        //     $usersFilter = in_array('users',$filters);

        //     if (count($gradesFilter)) :
        //         $lectures->whereIn('grade_id', $gradesFilter);
        //     endif;

        //     if (count($subjectsFilter)) :
        //         $lectures->whereIn('subject_id', $subjectsFilter);
        //     endif;

        //     if (count($partsFilter)) :
        //         $lectures->whereHas('parts', function ($query) use ($partsFilter) {
        //             $query->whereIn('part_id', $partsFilter);
        //         });
        //     endif;

        //     if (count($usersFilter)) :
        //         $lectures->whereIn('user_id', $usersFilter);
        //     endif;

        //     $lectures->where(function ($q) use ($free, $hasDiscount, $Paid) {
        //         if ($free) :
        //             $q->orWhere('price', 0);
        //         endif;
        //         if ($hasDiscount) :
        //             $q->orWhere('discount_expiry_date', '>', now());
        //         endif;
        //         if ($Paid) :
        //             $q->orWhere('price', '>', 0);
        //         endif;
        //     });
        // endif;
        endif;

        return view("home.search", compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLectureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLectureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLectureRequest  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLectureRequest $request, Lecture $lecture)
    {
        //
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
