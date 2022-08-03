<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class,'section_items','section_id','lesson_id');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class,'section_items','section_id','exam_id');
    }

    public function items(){
        return $this->hasMany(SectionItem::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }


}
