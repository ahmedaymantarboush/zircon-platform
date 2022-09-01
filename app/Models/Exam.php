<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        // 'lecture_id',
        'dynamic',
        'grade_id',
        'subject_id',
        'chances',
    ];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function dynamicQuestions()
    {
        return $this->hasMany(DynamicQuestion::class, 'exam_id', 'id');
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

    public function startExam($userId = null)
    {
        $user = User::find($userId) ?? Auth::user();
        if ($user) :
            if ($this->dynamic) :
                $chance = $this->passedExams()->where('user_id', $user->id)->count() + 1;
                $dynamicQuestions = $this->dynamicQuestions;
                foreach ($dynamicQuestions as $dynamicQuestion) :
                    if ($dynamicQuestion) :
                        foreach (Question::where(['level' => abs($dynamicQuestion->level - ($chance > 2 ? $chance - 2 : 0)), 'part_id' => $dynamicQuestion->part->id, 'grade_id' => $user->grade->id])->inRandomOrder()->take($dynamicQuestion->count)->get() as $question) :
                            if ($question) :
                                $user->answerdQuestions()->create([
                                    'question_id' => $question->id,
                                    'exam_id' => $this->id,
                                    'answer' => '',
                                    'correct' => false,
                                    'chance' => $chance,
                                ]);
                            endif;
                        endforeach;
                    endif;
                endforeach;
                $user->passedExams()->create([
                    'exam_id' => $this->id,
                    'percentage' => 0,
                    'started_at' => now(),
                    'ended_at' => $this->time ? now()->addSeconds($this->time) : null,
                    'finished' => false,
                    'chance' => $chance,
                ]);
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
                    endif;
                endforeach;
                $user->passedExams()->create([
                    'exam_id' => $this->id,
                    'percentage' => 0,
                    'started_at' => now(),
                    'ended_at' =>  $this->time ? now()->addSeconds($this->time) : null,
                    'finished' => false,
                ]);
            endif;
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

    public function passedExams()
    {
        return $this->hasMany(PassedExam::class, 'exam_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'passed_exams', 'exam_id', 'user_id');
    }

    public function answerdQuestions()
    {
        return $this->hasMany(AnswerdQuestion::class, 'exam_id');
    }
}
