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
        if (!$sectionItem->section->lecture->owners->contains($user) && $user->role->number >= 4) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض العنصر'), [], 403);
        endif;
        $data = [
            'title' => $sectionItem->title,
            'type' => $sectionItem->exam_id ? 'exam' : 'lesson',
        ];
        if ($sectionItem->lesson_id) :
            $lesson = $sectionItem->item;
            $exam = $lesson->exam ?? null;

            $passedExam = $exam ? $user->passedExams()->where('exam_id', $exam->id)->orderBy('chance','desc')->first() : null;

            $openable = !$exam || ($exam ? ($passedExam ? $passedExam->percentage >= $lesson->min_percentage : false)  : false);
            if ($openable) :
                $userLesson = UserLesson::firstOrCreate([
                    'lesson_id' => $lesson->id,
                    'user_id' => $user->id,
                ]);
            endif;
            $urls = getVideoUrl(getVideoId($lesson->url));

            $hasChance = $passedExam ? ($passedExam->finished || ($passedExam->ended_at ? $passedExam->ended_at <= now() : false)) && $passedExam->chance < 3 : true;
            $hasChance = $hasChance && ($exam ? $exam->dynamic : true);

            $finished = $passedExam ? $passedExam->finished || ($passedExam->ended_at ? $passedExam->ended_at <= now() : false) : false;

            if ($finished) :
                $passedExam->finished = true;
                $passedExam->save();
            endif;

            $item = [
                'id' => $lesson->id,
                'type' => $lesson->type,

                'exam' => $exam ? $exam->id : null,
                'examName' => $exam ? $exam->title : null,
                'finished' => $finished,
                'passedExamId' => $passedExam ? $passedExam->id : null,
                'percentage' => $finished ? $passedExam->percentage : null,
                'minPercentage' => $lesson->min_percentage,
                'questionsCount' => $exam ? $exam->questions_count : null,
                'correctAnswers' =>  $finished ? $passedExam->exam->answerdQuestions()->where(['correct'=> 1, 'chance'=>$passedExam->chance])->count() : null,
                'chance' => $passedExam && $hasChance ? $passedExam->chance : null,
                'chancesCount' => $exam && $hasChance ? $exam->chances : null,

                'grade' => $lesson->grade->name,
                'part' => $lesson->part->name,
                'description' => $lesson->description,
                'urls' => $openable ? (count($urls) ? $urls : $lesson->url) : null,
            ];
        else :

            $exam = $sectionItem->item;
            $passedExam = $user->passedExams()->where('exam_id', $exam->id)->orderBy('chance','desc')->first();

            $hasChance = $passedExam ? ($passedExam->finished || ($passedExam->ended_at ? $passedExam->ended_at <= now() : false)) && $passedExam->chance < $exam->chances : true;
            $hasChance = $hasChance && ($exam ? $exam->dynamic : true);

            $finished = $passedExam ? $passedExam->finished || ($passedExam->ended_at ? $passedExam->ended_at <= now() : false) : false;

            if ($finished) :
                $passedExam->finished = true;
                $passedExam->save();
            endif;

            $item = [
                'id' => $exam->id,
                'questionsCount' => $exam->questions_count,
                'examName' => $exam->title,
                'finished' => $finished,
                'passedExamId' => $passedExam ? $passedExam->id : null,
                'correctAnswers' =>  $finished ? $passedExam->exam->answerdQuestions()->where(['correct' => 1, 'chance' => $passedExam->chance])->count() : null,

                'hasChance' => $hasChance,
                'chance' => $passedExam ? $passedExam->chance : null,
                'chancesCount' => $exam ? $exam->chances : null,

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
