<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'part_id',
        'lecture_id',
        'dynamic_questions',
    ];

    public function dynamicQuestion()
    {
        return $this->hasMany(DynamicExam::class, 'exam_id','id');
    }
    public function questions()
    {
        if ($this->dynamic) :
            return $this->belongsToMany(Question::class, 'answerd_questions', 'exam_id', 'question_id');
        else :
            return $this->belongsToMany(Question::class, 'exam_questions');
        endif;
    }

    public function examQuestions()
    {
        if ($this->dynamic) :
            $user = apiUser();
            if ($user) :
                if ($user->answerdQuestions()->where('exam_id', $this->id)->count()) :
                    return $this->hasMany(AnswerdQuestion::class)->with('question')->where('user_id', $user->id);
                endif;

                $dynamicQuestions = $this->dynamicQuestion;
                foreach ($dynamicQuestions as $dynamicQuestion) :
                    if ($dynamicQuestion) :
                        foreach (Question::where(['level' => $dynamicQuestion->level, 'part_id' => $dynamicQuestion->part->id])->inRandomOrder()->take($dynamicQuestion->count)->get() as $question) :
                            if ($question) :
                                $user->answerdQuestions()->create([
                                    'question_id' => $question->id,
                                    'exam_id' => $this->id,
                                    'answer' => '',
                                    'correct' => false,
                                ]);
                                $user->passedExams()->create([
                                    'exam_id' => $this->id,
                                    'percentage' => 0,
                                    'remaining_time' => '',
                                    'finished' => false,
                                ]);
                            endif;
                        endforeach;
                    endif;
                endforeach;
                return $this->hasMany(AnswerdQuestion::class)->with('question')->where('user_id', $user->id);
            else :
                return null;
            endif;
        else :
            $user = apiUser();
            if ($user) :
                $questions = $this->questions;
                foreach ($questions as $question) :
                    if ($question) :
                        $user->answerdQuestions()->create([
                            'question_id' => $question->id,
                            'exam_id' => $this->id,
                            'answer' => '',
                            'correct' => false,
                        ]);
                        $user->passedExams()->create([
                            'exam_id' => $this->id,
                            'percentage' => 0,
                            'remaining_time' => '0',
                            'finished' => false,
                        ]);
                    endif;
                endforeach;
                return $this->hasMany(AnswerdQuestion::class)->with('question')->where('user_id', $user->id);
            else :
                return null;
            endif;
        endif;
    }

    private function createDynamicExam()
    {
        $user = apiUser();
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }

    public function openedExams()
    {
        return $this->hasMany(PassedExam::class, 'exam_id');
    }
}
