<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassedExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',
        'percentage',
        'exam_started_at',
        'exam_ended_at',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        $user = apiUser();
        if ($user) :
            return $this->hasMany(ExamQuestion::class)->with('question')->where('user_id', $user->id);
        else :
            return null;
        endif;
    }

}
