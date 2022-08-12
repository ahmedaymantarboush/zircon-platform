<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
        'section_id',
        'lesson_id',
        'exam_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }


    public function item()
    {
        if ($this->lesson_id):
            return $this->belongsTo(Lesson::class, 'lesson_id');
        else:
            return $this->belongsTo(Exam::class, 'exam_id');
        endif;
    }


    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

}
