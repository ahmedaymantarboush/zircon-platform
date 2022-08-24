<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Lesson;
use App\Models\SectionItem;
use Illuminate\Http\Request;

class SectionItemController extends Controller
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
        $sectionItem = SectionItem::find($id);
        if (!$sectionItem) :
            return apiResponse(false, _('لم يتم العثور على العنصر'), [], 404);
        endif;
        if (!$sectionItem->section->lecture->owners->contains($user)) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض العنصر'), [], 403);
        endif;
        $data = [
            'title' => $sectionItem,
            'type' => $sectionItem->exam_id ? 'exam' : 'lesson',
        ];

        if ($sectionItem->lesson_id) :
            $lesson = $sectionItem->item;
            $urls = getVideoUrl(getVideoId($lesson->url));
            $item = [
                'type' => $lesson->type,
                'exam' => $lesson->exam_id,
                'grade' => $lesson->grade->name,
                'part' => $lesson->part->name,
                'description' => $lesson->description,
                'urls' => count($urls) ? $urls : $lesson->url
            ];
        else :
            $exam = $sectionItem->item;
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
                $answerdQuestions[] = $answerdQuestion->id;
            endforeach;
            $item = [
                'questions' => $answerdQuestions,
                'examStartedAt' => $passedExam->exam_started_at,
                'examEndedAt' => $passedExam->exam_ended_at,
                'finished' => $passedExam->finished,
            ];

        endif;
        $data["item"] = $item;

        return apiResponse(true, _('تم العثور على العنصر'), $data);
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
