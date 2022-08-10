<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory,
        SoftDeletes;
    protected $fillable = [
        'title',
        'lecture_id',
        'order',
        'time',
        'total_questions_count',
        'description',
    ];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'section_items', 'section_id', 'lesson_id');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'section_items', 'section_id', 'exam_id');
    }

    public function items()
    {
        return $this->hasMany(SectionItem::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
