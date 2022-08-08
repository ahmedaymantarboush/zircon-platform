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
        'dynamic',
    ];

    public function dynamicExams()
    {
        return $this->hasMany(DynamicExam::class, 'exam_id', 'id');
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
        $user = apiUser();
        if ($user) :
            return $this->hasMany(AnswerdQuestion::class)->with('question')->where('user_id', $user->id);
        else :
            return null;
        endif;
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function startExam()
    {
        $user = apiUser();
        if ($this->dynamic) :
            $dynamicQuestions = $this->dynamicExams;
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
                            $examEndTime = now();
                            $examTime = explode(' ', $this->time);
                            if ($examTime[1] == 'ثواني') :
                                $examEndTime = now()->addSeconds($examTime[0]);
                            elseif ($examTime[1] == 'دقائق') :
                                $examEndTime = now()->addMinutes($examTime[0]);
                            elseif ($examTime[1] == 'ساعات') :
                                $examEndTime = now()->hours($examTime[0]);
                            endif;
                            $user->passedExams()->create([
                                'exam_id' => $this->id,
                                'percentage' => 0,
                                'exam_started_at' => now(),
                                'exam_ended_at' => $examEndTime,
                                'finished' => false,
                            ]);
                        endif;
                    endforeach;
                endif;
            endforeach;
        else :
            $questions = $this->questions;
            foreach ($questions as $question) :
                if ($question) :
                    $user->answerdQuestions()->create([
                        'question_id' => $question->id,
                        'exam_id' => $this->id,
                        'answer' => '',
                        'correct' => false,
                    ]);
                    $examEndTime = now();
                    $examTime = explode(' ', $this->time);
                    if ($examTime[1] == 'ثواني') :
                        $examEndTime = now()->addSeconds($examTime[0]);
                    elseif ($examTime[1] == 'دقائق') :
                        $examEndTime = now()->addMinutes($examTime[0]);
                    elseif ($examTime[1] == 'ساعات') :
                        $examEndTime = now()->hours($examTime[0]);
                    endif;
                    $user->passedExams()->create([
                        'exam_id' => $this->id,
                        'percentage' => 0,
                        'exam_started_at' => now(),
                        'exam_ended_at' => $examEndTime,
                        'finished' => false,
                    ]);
                endif;
            endforeach;
        endif;
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }

    public function passedExam()
    {
        return $this->hasMany(PassedExam::class, 'exam_id');
    }
}
