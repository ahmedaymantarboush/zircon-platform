<?php

namespace App\Http\Controllers\Web;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Section;
use App\Models\SectionItem;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : true) {

            $section = Section::findOrFail($data['section']);
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
            $lesson->user_id = $user->id;
            $lesson->part_id = $data['part'];
            $lesson->description = $data['description'];

            if (array_key_exists('dependsOnExam', $data)) {
                $lesson->exam_id = $data['exam'];
                $lecture->total_questions_count += Exam::find($data['exam'])->questions_count;
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
            return redirect()->back();
        } else {
            return abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonRequest  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $data = $request->all();
        $user = Auth::user();
        if (!$user) :
            return abort(403);
        endif;
        $id = $data['id'] ?? 0;
        $lesson = Lesson::find($id);
        if (!$lesson) :
            return abort(404);
        endif;
        if ($lesson->publisher->id != $user->id) :
            return abort(403);
        endif;

        $section = SectionItem::where(['lesson_id' => $lesson->id])->first()->section;
        $lecture = $section->lecture;
        $time = getDuration($data['newurl']);

        $lesson->title = $data['newtitle'];
        $lesson->url = getEmbedVideoUrl($data['newurl']);
        $lecture->time -= $lesson->time;
        $lesson->time = $time;
        $lecture->time += $time;
        $lesson->grade_id =  $lecture->grade->id;
        $lesson->type = 'video';
        $lesson->semester = $lecture->semester;
        $lesson->subject_id = $lecture->subject->id;
        $lesson->part_id = $data['newpart'];
        $lesson->description = $data['newdescription'];

        if ($request->boolean('dependsOnExam')) :
            $lecture->total_questions_count -= $lesson->exam_id ? $lesson->exam->questions_count : 0;
            $lesson->exam_id = $data['newexam'];
            $lecture->total_questions_count += Exam::find($data['newexam'])->questions_count;
            $lesson->min_percentage =  $data['newpercentage'];
        else :
            $lecture->total_questions_count -= $lesson->exam_id ? $lesson->exam->questions_count : 0;
            $lesson->exam_id = null;
            $lesson->min_percentage = null;
        endif;

        $sectionItem = SectionItem::where(['section_id' => $section->id, 'lesson_id' => $lesson->id])->first();
        $sectionItem->lesson_id = $lesson->id;
        $sectionItem->section_id = $data['newsection'];

        $sectionItem->save();
        $lesson->save();
        $lecture->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = request()->all();
        $id = $data['id'];
        $sectionItem = SectionItem::findOrFail($id);
        if ($sectionItem->lesson):
            $sectionItem->lesson->delete();
        endif;
        $sectionItem->section->lecture->time -= $sectionItem->lesson->time;
        $sectionItem->section->lecture->save();
        $sectionItem->delete();
        return redirect()->back();
    }
}
