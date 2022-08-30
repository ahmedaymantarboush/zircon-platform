<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerdQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'exam_id',
        'answer',
        'correct',
        'flagged',
        'chance',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
}
