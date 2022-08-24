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
            $answerdQuestions[] = $answerdQuestion->id;
        endforeach;
        $data = [
            'questions' => $answerdQuestions,
            'examStartedAt' => $passedExam->exam_started_at,
            'examEndedAt' => $passedExam->exam_ended_at,
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
