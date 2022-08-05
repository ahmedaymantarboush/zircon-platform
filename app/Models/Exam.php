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

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_questions');
    }
}
