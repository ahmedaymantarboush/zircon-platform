<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Http\Resources\ExamResource;
use App\Http\Resources\PassedExamResource;
use App\Models\Exam;
use App\Models\PassedExam;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        $this->validator($request->all(), true)->validate();
        $exam = Exam::create([
            'title' => $request->title,
        ]);
        return apiResponse(true, _('تم انشاء الامتحان بنجاح'), new ExamResource($exam));
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
        $user = apiuser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;

        $id = $data['id'];
        $passedExam = $user->passedExams()->where('exam_id', $id)->first();
        if (!$passedExam) :
            $exam = Exam::find($id);
            if (!$exam) :
                return apiResponse(false, _('الامتحان الذي طلبته غير موجود'), [], 401);
            endif;
            $exam->startExam();
            $passedExam = $user->passedExams()->where('exam_id', $id)->first();
        endif;

        if (!$passedExam) :
            return apiResponse(false, _('عفوا حدث خطأ ما لذلك لم نتمكن من انشاء الامتحان الخاص بالطالب'), [], 500);
        endif;
        $exam = $passedExam->exam;
        $answerdQuestions = [];
        foreach ($exam->answerdQuestions()->inRandomOrder()->get() as $answerdQuestion) :
            $answerdQuestions[] = [
                'id' => $answerdQuestion->id,
                'flagged' => $answerdQuestion->flagged,
            ];
        endforeach;
        $data = [
            'questions' => $answerdQuestions,
            'examStartedAt' => $passedExam->started_at,
            'examEndedAt' => $passedExam->ended_at,
            'finished' => $passedExam->finished,
        ];
        return apiResponse(true, _('الامتحان الذي طلبته موجود'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, $id)
    {
        $exam = auth()->user()->exams()->find($id);
        if (!$exam) {
            return apiResponse(false, _('الامتحان الذي طلبته غير موجود'), [], 401);
        }
        if ($request->title) $exam->title = $request->title;
        $exam->save();

        return apiResponse(true, _('تم تعديل الامتحان بنجاح'), new ExamResource($exam));
    }

    public function getExam()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser() ?? Auth::user();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $exam = Exam::find($id);
        if (!$exam) :
            return apiResponse(false, _('لم يتم العثور على الامتحان'), [], 404);
        endif;

        $passedExam = $user->passedExams()->where('exam_id', $exam->id)->first();
        if (!$passedExam) :
            $exam = Exam::find($id);
            if (!$exam) :
                return apiResponse(false, _('الامتحان الذي طلبته غير موجود'), [], 404);
            endif;
            $exam->startExam();
            $passedExam = $user->passedExams()->where('exam_id', $exam->id)->first();
        endif;
        if (!$passedExam) :
            return apiResponse(false, _('عفوا حدث خطأ ما لذلك لم نتمكن من انشاء الامتحان الخاص بالطالب'), [], 500);
        endif;

        $exam = $passedExam->exam;
        $answerdQuestions = [];
        foreach ($exam->answerdQuestions()->inRandomOrder()->get() as $answerdQuestion) :
            $answerdQuestions[] = [
                'id' => $answerdQuestion->id,
                'flagged' => $answerdQuestion->flagged,
            ];
        endforeach;

        if ($passedExam->finished || ($passedExam->ended_at ? $passedExam->ended_at <= now() : false ) ):
            if (!$passedExam->finished):
                $passedExam->ended_at = now();
            endif;
            $passedExam->finished = true;
            $passedExam->save();
        endif;

        $data = [
            'id' => $passedExam->id,
            'questions' => $answerdQuestions,
            'time' => $exam->time,
            'examStartedAt' => $passedExam->started_at,
            'examEndedAt' => $passedExam->ended_at,
            'finished' => $passedExam->finished,
        ];

        return apiResponse(true, _('تم العثور على العنصر'), $data);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = auth()->user()->exams()->find($id);
        if (!$exam) {
            return apiResponse(false, _('الامتحان الذي طلبته غير موجود'), [], 401);
        }
        $exam->delete();
        return apiResponse(true, _('تم حذف الامتحان بنجاح'), []);
    }
}
