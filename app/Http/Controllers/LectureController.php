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
        if (count($lectures)) :
            return view("home.grades", compact('lectures'));
        else :
            return abort(404);
        endif;
    }

    public function search()
    {
        $search = request()->q;
        $filters = request()->filters;
        $subjects  = [];
        $grades    = [];
        $parts     = [];
        $users     = [];
        $lectures  = Lecture::where(['published' => true]);
        // if ($filters) :


        //     if ($filters) :
        //         $gradesFilter = $filters->grades;
        //         $subjectsFilter = $filters->subjects;
        //         $partsFilter = $filters->parts;
        //         $usersFilter = $filters->users;

        //         if (count($gradesFilter)) :
        //             foreach ($gradesFilter as $gradeId) :
        //                 $grades = Grade::where('name', 'like', "%$search%")->Where(function ($query) use ($gradeId) {
        //                     $query->orWhere('id', $gradeId);
        //                 })->get();
        //             endforeach;
        //         endif;
        //         if (count($subjectsFilter)) :
        //             foreach ($subjectsFilter as $subjectId) :
        //                 $subjecs = Subject::where('name', 'like', "%$search%")->Where(function ($query) use ($subjectId) {
        //                     $query->orWhere('id', $subjectId);
        //                 })->get();
        //             endforeach;
        //         endif;
        //         if (count($partsFilter)) :
        //             foreach ($partsFilter as $partId) :
        //                 $parts = Part::where('name', 'like', "%$search%")->Where(function ($query) use ($partId) {
        //                     $query->orWhere('id', $partId);
        //                 })->get();
        //             endforeach;
        //         endif;
        //         if (count($usersFilter)) :
        //             foreach ($usersFilter as $userId) :
        //                 $users = User::where('name', 'like', "%$search%")->Where(function ($query) use ($userId) {
        //                     $query->orWhere('id', $userId);
        //                 })->get();
        //             endforeach;
        //         endif;
        //     endif;

        //     // foreach ([] as $filter) :
        //     //     if (str_starts_with($filter, 'subject')) :
        //     //         $subjectId = (int) substr($filter, 8);
        //     //         $subjects = Subject::where('name', 'like', "%$search%")->Where(function ($query) use ($subjectId) {
        //     //             $query->orWhere('id', $subjectId);
        //     //         })->get();
        //     //     elseif (str_starts_with($filter, 'grade')) :
        //     //         $gradeId = (int) substr($filter, 5);
        //     //         $grades = Grade::where('name', 'like', "%$search%")->Where(function ($query) use ($gradeId) {
        //     //             $query->orWhere('id', $gradeId);
        //     //         })->get();
        //     //     elseif (str_starts_with($filter, 'part')) :
        //     //         $partId = (int) substr($filter, 4);
        //     //         $parts = Part::where('name', 'like', "%$search%")->Where(function ($query) use ($partId) {
        //     //             $query->orWhere('id', $partId);
        //     //         })->get();
        //     //     elseif (str_starts_with($filter, 'user')) :
        //     //         $partId = (int) substr($filter, 4);
        //     //         $parts = Part::where('name', 'like', "%$search%")->Where(function ($query) use ($partId) {
        //     //             $query->orWhere('id', $partId);
        //     //         })->get();
        //     //     elseif ($filter == 'free') :
        //     //         $lectures->orWhere('final_price', 0);
        //     //     elseif ($filter == 'hasDiscount') :
        //     //         $lectures->orWhere('discount_expiry_date', '!=', null);
        //     //     elseif ($filter == 'paid') :
        //     //         $lectures->orWhere('final_price', '!=', 0);
        //     //     endif;
        //     // endforeach;
        // endif;
        $grades   = count($grades) ? $grades : Grade::where('name', 'like', "%$search%")->get();
        $parts    = count($parts) ? $parts : Part::where('name', 'like', "%$search%")->get();
        $subjects = count($subjects) ? $subjects : Subject::where('name', 'like', "%$search%")->get();
        $users    = User::where('name', 'like', "%$search%")->get();
        $lessons  = Lesson::where('title', 'like', "%$search%")->get();
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
        else :
            $lectures = Null;
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
