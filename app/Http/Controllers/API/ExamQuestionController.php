<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExamQuestion;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamQuestionController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم باضافة السؤال'), [], 401);
        endif;

        Validator::make($data, [
            'exam' => ['required', 'exists:exams,id'],
            'question' => ['required', 'exists:questions,id']
        ]);

        $examQuestion = ExamQuestion::create([
            'exam_id' => $data['exam'],
            'question_id' => $data['question'],
        ]);

        $exam = $examQuestion->exam;
        $exam->questions_count += 1;
        foreach (Section::where('exam_id', $exam->id)->get() as $sectionItem) :
            $lecture = $sectionItem->section->lecture;
            $lecture->total_questions_count += 1;
            $lecture->save();
        endforeach;
        $exam->save();

        return apiResponse(true, _('تم اضافة السؤال بنجاح'), [
            'id'=>$examQuestion->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم بتعديل السؤال'), [], 401);
        endif;

        Validator::make($data, [
            'exam' => ['required', 'exists:exams,id'],
            'question' => ['required', 'exists:questions,id']
        ]);

        $id = $data['id'];
        $questionId = $data['question'];
        $question = Question::find($questionId);
        if (!$question) :
            return apiResponse(false, _('لم يتم العثور على السؤال'), [], 404);
        endif;

        $examQuestion = ExamQuestion::find($id);
        if (!$examQuestion):
            return apiResponse(false, _('لم يتم العثور على السؤال في الامتحان'), [], 404);
        endif;
        $examQuestion->update(['question_id'=>$questionId]);

        return apiResponse(true, _('تم تعديل السؤال بنجاح'), []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المستخدم بحذف السؤال'), [], 401);
        endif;

        $id = $data['id'];
        $examQuestion = ExamQuestion::find($id);
        if ($examQuestion) :
            $exam =$examQuestion->exam;
            $exam->questions_count -= 1;
            foreach (Section::where('exam_id', $exam->id)->get() as $sectionItem) :
                $lecture = $sectionItem->section->lecture;
                $lecture->total_questions_count -= 1;
                $lecture->save();
            endforeach;
            $exam->save();
            $examQuestion->delete();
        endif;
        return apiResponse(true, _('تم حذف السؤال بنجاح'), []);
    }
}
