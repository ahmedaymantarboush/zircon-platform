<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AnswerdQuestion;
use App\Models\Choice;
use Illuminate\Http\Request;

class AnswerdQuestionController extends Controller
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
        //
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
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $answerdQuestion = AnswerdQuestion::where(['id'=>$id,'user_id'=>$user->id])->first();
        if (!$answerdQuestion) :
            return apiResponse(false, _('لم يتم العثور على السؤال'), [], 404);
        endif;
        if ($answerdQuestion->user->id != $user->id):
            return apiResponse(false, _('غير مصرح لهذا المسخدم تسجيل اجابة السؤال'), [], 403);
        endif;
        $examId = $answerdQuestion->exam_id;
        $passedExam = $user->passedExams()->where(['exam_id'=>$examId])->first();
        if (!$passedExam){
            return apiResponse(false, _('لم يتم العثور على الامتحان'), [], 404);
        }
        if ($passedExam->finished || ( $passedExam->ended_at ? $passedExam->ended_at >= now() : false )):
            return apiResponse(false, _('غير مصرح لهذا المسخدم تسجيل اجابة السؤال'), [], 403);
        endif;
        $choiceId = $data['choiceId'] ?? null;
        $answer = $data['answer'] ?? null;
        $flagged = $data['flagged'] ?? null;
        
        if ($choiceId){
            $choice = Choice::where(['id'=>$choiceId,'question_id'=>$answerdQuestion->question->id])->first();
            $answerdQuestion->choice_id = $choice->id;
            $answerdQuestion->correct = $choice->correct;
        }
        if ($answer){
            $answerdQuestion->answer = $answer;
        }
        return $data;
        if (is_null($flagged)){
            $answerdQuestion->flagged = $flagged;
        }
        $answerdQuestion->save();
        
        $correctAnswers = $user->answerdQuestions()->where(['correct'=>1,'exam_id'=>$examId])->count();
        

        $passedExam->percentag = number_format(($correctAnswers / $user->answerdQuestions()->where(['exam_id'=>$examId])->count()) * 100, 2);
        $passedExam->save();
        dd($data);
        
        return apiResponse(true, _('تم تسجيل اجابة السؤال'), []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
