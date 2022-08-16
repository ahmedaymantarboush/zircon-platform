<?php

namespace App\Http\Controllers\Web;

use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
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
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false):
            return view('admin.addExam');
        else:
            return abort(404);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false):
            $time = 0;
            foreach(explode(':', $request->totalTime) as $index => $timePart):
                $time += intval($timePart) * pow(60, 2 - $index);
            endforeach;
            $exam = new Exam();
            $exam->title = $request->name;
            $exam->dynamic = $request->exam_type == 'zirconExam';
            $exam->grade_id = Grade::where('name',$request->grade)->first()->id;
            // $exam->subject_id = Subject::where('name',$request->subject)->first()->id;
            $exam->questions_hardness = $request->question_hardness;
            $exam->time = $time;
            $exam->description = $request->description;
            $exam->starts_at = $request->examStartsAt;
            $exam->ends_at = $request->examEndsAt;
            $exam->user_id = $user->id;
            $exam->save();
            return redirect()->route('exams.edit', $exam->id);
        else:
            return abort(404);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        if (!$exam) {
            return abort(404);
        }
        $user = Auth::user();
        if ($user ? $user->role->number < 4 && $exam->publisher->id == $user->id : false):
            return view('admin.editExam', compact('exam'));
        else:
            return abort(404);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamRequest  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, $id)
    {
        $user = Auth::user();
        if ($user ? $user->role->number < 4 : false):
            $time = 0;
            foreach(explode(':', $request->totalTime) as $index => $timePart):
                $time += intval($timePart) * pow(60, 2 - $index);
            endforeach;
            $exam = Exam::find($id);
            if (!$exam) {
                return abort(404);
            }elseif($exam->publisher->id != $user->id){
                return abort(403);
            }
            $exam->title = $request->name;
            $exam->dynamic = $request->exam_type == 'zirconExam';
            $exam->grade_id = Grade::where('name',$request->grade)->first()->id;
            $exam->questions_hardness = $request->question_hardness;
            $exam->time = $time;
            $exam->description = $request->description;
            $exam->starts_at = $request->examStartsAt;
            $exam->ends_at = $request->examEndsAt;
            $exam->save();



            return redirect()->route('exams.edit', $exam->id);
        else:
            return abort(404);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        if (!$exam) {
            return abort(404);
        }
        $user = Auth::user();
        if ($user ? $user->role->number < 4 && $exam->publisher->id == $user->id : false):
            $exam->delete();
            return redirect()->back();
        else:
            return abort(404);
        endif;
    }
}
