<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Lesson;
use App\Models\SectionItem;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = apiUser() ?? Auth::user();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $sectionItem = SectionItem::find($id);
        if (!$sectionItem) :
            return apiResponse(false, _('لم يتم العثور على العنصر'), [], 404);
        endif;
        if (!$sectionItem->section->lecture->owners->contains($user) || $user->role->number >= 4 ) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض العنصر'), [], 403);
        endif;
        $data = [
            'title' => $sectionItem->title,
            'type' => $sectionItem->exam_id ? 'exam' : 'lesson',
        ];
        if ($sectionItem->lesson_id) :
            $lesson = $sectionItem->item;
            $userLesson = UserLesson::firstOrCreate([
                'lesson_id'=>$lesson->id,
                'user_id'=>$user->id,
            ]);
            $urls = getVideoUrl(getVideoId($lesson->url));
            $exam = $lesson->exam ?? null;

            $passedExam = $exam ? $user->passedExams()->where('exam_id', $exam->id)->first() : null;

            $finished = $passedExam ? $passedExam->finished || $passedExam->exam_ended_at >= now() : false;

            $item = [
                'type' => $lesson->type,

                'exam' => $exam ? $exam->id : null,
                'examName' => $exam ? $exam->title : null,
                'finishedExam' => $finished,
                'percentage' => $finished ? $passedExam->percentage : null,
                'minPercentage' => $lesson->min_percentage,

                'grade' => $lesson->grade->name,
                'part' => $lesson->part->name,
                'description' => $lesson->description,
                'urls' => count($urls) ? $urls : $lesson->url
            ];
        else :

            $exam = $sectionItem->item;
            $passedExam = $user->passedExams()->where('exam_id', $exam->id)->first();
            $finished = $passedExam ? $passedExam->finished || $passedExam->exam_ended_at >= now() : false;

            $item = [
                'id' => $exam->id,
                'questionsCount' => $exam->questions_count,
                'examName' => $exam->title,
                'finished' => $finished,
                'correctAnswers' =>  $finished ? $passedExam->exam->answerdQuestions()->where('correct',1)->count() : null,
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
