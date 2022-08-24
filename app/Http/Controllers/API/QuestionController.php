<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AnswerdQuestion;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number < 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        $grade = $data['grade'] ?? 0;
        $subject = $data['subject'] ?? 0;
        $level = $data['level'] ?? 0;
        $part = $data['part'] ?? 0;
        if ($grade && $subject && $level && $part) :
            $questions = Question::where(['user_id' => $user->id, 'grade_id' => $grade, 'subject_id' => $subject, 'level' => $level, 'part_id' => $part])->select(['id', 'name'])->get();
        else :
            $questions = Question::where('user_id', $user->id)->select(['id', 'name'])->get();
        endif;
        if (!count($questions)) :
            return apiResponse(false, _('لم يتم العثور على أسئلة'), [], 404);
        endif;
        return apiResponse(true, _('تم العثور على أسئلة'), $questions);
    }

    public function fastEdit()
    {
        $data = json_decode(request()->data, true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        if ($user->role->number < 4):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل الطالب'), [], 403);
        endif;
        $id = $data['id'] ?? 0;
        $question = Question::find($id);
        if (!$question) :
            return apiResponse(false, _('لم يتم العثور على السؤال'), [], 404);
        endif;
        if ($question->publisher->id != $user->id) :
            return apiResponse(false, _('غير مصرح لهذا المسخدم بتعديل السؤال'), [], 403);
        endif;
        $choices = [];
        if ($question->choices) :
            foreach ($question->choices as $choice) {
                $choices[] = [
                    'id' => $choice->id,
                    'text' => $choice->text,
                    'isCorrect' => $choice->correct,
                ];
            }
        endif;
        return apiResponse(true, _('تم العثور على السؤال'), [
            'name' => $question->name,
            'grade' => $question->grade->id,
            'subject' => $question->subject->id,
            'part' => $question->part->id,
            'level' => $question->level,
            'choicesCount' => count($choices),
            'text' => $question->text,
            'image' => $question->image,
            'choices' => $choices,
        ]);
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
        $data = json_decode(request()->data,true);
        $user = apiUser();
        if (!$user) :
            return apiResponse(false, _('يجب تسجيل الدخول أولا'), [], 401);
        endif;
        $id = $data['id'] ?? 0;
        $answerdQuestion = AnswerdQuestion::find($id);
        if (!$answerdQuestion) :
            return apiResponse(false, _('لم يتم العثور على السؤال'), [], 404);
        endif;
        if ($answerdQuestion->user->id != $user->id):
            return apiResponse(false, _('غير مصرح لهذا المسخدم بعرض السؤال'), [], 403);
        endif;
        $question = $answerdQuestion->question;
        $choices = [];
        foreach ($question->choices()->inRandomOrder()->get() as $choice):
            $choices[] = [
                'id'=> $choice->id,
                'text'=> $choice->text,
            ];
        endforeach;
        $filterdQuestion = [
            'name' => $question->name,
            'text' => $question->text,
            'image' => $question->image,
            'choices' => $choices,
        ];
        return apiResponse(true, _('تم العثور على السؤال'), [
            'flagged' => $answerdQuestion->flagged,
            'textAnswer' => $answerdQuestion->answer,
            'choice' => $answerdQuestion->choice->id,
            'question' => $filterdQuestion,
        ]);
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
