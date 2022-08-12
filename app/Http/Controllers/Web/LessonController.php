<?php

namespace App\Http\Controllers\Web;

use App\Models\Lesson;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SectionItem;

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

        $request->validate([
            'section' => 'required|exists:sections,id',
            'lessonTitle' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|string|max:255|unique:lessons,url',
        ]);

        $section = Section::findOrFail($data['section']);
        $lecture = $section->lecture;
        $time = getDuration($data['url']);

        $lesson = new Lesson();
        $lesson->title = $data['lessonTitle'];
        $lesson->url = $data['url'];
        $lesson->time = $time;
        $lecture->time += $time;
        $lesson->grade_id=  $lecture->grade->id;
        $lesson->type = 'video';
        $lesson->semester = $lecture->semester;
        $lesson->subject_id= $lecture->subject->id;
        $lesson->lecture_id = $lecture->id;
        $lesson->part_id = $data['lessonPart'];
        $lesson->description = $data['description'];

        if (array_key_exists('dependsOnExam', $data)){
            $lesson->exam_id = $data['exam'];
            $lesson->min_percentage =  $data['percentage'];
        }

        $lesson->save();
        $lecture->save();
        if ($lesson){
            SectionItem::create([
                'title' => $lesson->title,
                'lesson_id' => $lesson->id,
                'order' => count($section->items) + 1,
                'section_id' => $section->id,
            ]);
        }
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        Lesson::findOrFail($id)->delete();
        return redirect()->back();
    }
}
