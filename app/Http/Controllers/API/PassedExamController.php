<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\PassedExam;
use App\Models\SectionItem;
use Illuminate\Http\Request;

class PassedExamController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $passedExam = PassedExam::find($id);
        if (!$passedExam) :
            return apiResponse(false, _('لم يتم العثور على الامتحان'), [], 404);
        endif;
        if ($passedExam->user->id != $user->id && $user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض الامتحان'), [], 403);
        endif;
        if (!$passedExam->finished || ($passedExam->exam_ended_at ? $passedExam->exam_ended_at < now() : false)) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض الامتحان'), [], 403);
        endif;

        $questions = [];
        foreach ($passedExam->answerdQuestions as $answerdQuestion) :
            $choices = [];
            foreach ($answerdQuestion->choices as $choice) :
                $choices[] = [
                    'id' => $choice->id,
                    'correct' => $choice->correct,
                    'text' => $choice->text,
                ];
            endforeach;
            $question = $answerdQuestion->question;
            $questionData = [
                'text' => $question->text,
                'image' => $question->image,
                'explanation' => $question->explanation,
                'choices' => $choices,
            ];
            $questions[] = [
                'id' => $answerdQuestion->id,
                'choice' => $answerdQuestion->choices->id,
                'flagged' => $answerdQuestion->flagged,
                'textAnswer' => $answerdQuestion->answer,
                'question' => $questionData,
            ];
        endforeach;

        return apiResponse(true, _('لم العثور على الامتحان'), [
            'examstartedAt' => $passedExam->exam_started_at,
            'examEndedAt' => $passedExam->exam_ended_at,
            'percentage' => $passedExam->percentage,
            'correctAnswers' => $passedExam->answerdQuestions()->where(['correct' => 1])->count(),
            'wrongAnswers' => $passedExam->answerdQuestions()->where(['correct' => 0])->count(),
            'questions' => $questions,
        ]);
    }

    public function finishExam()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $passedExam = PassedExam::find($id);

        if (!$passedExam) :
            return apiResponse(false, _('لم يتم العثور على الامتحان'), [], 404);
        endif;
        if ($passedExam->user->id != $user->id && $user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض الامتحان'), [], 403);
        endif;
        if (!$passedExam->finished) :
            $passedExam->exam_ended_at = now();
        endif;
        $passedExam->finished = true;
        $passedExam->save();

        return apiResponse(true, _("تم انهاء الامتحان بنجاح"), []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
