<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'semester',
        'short_description',
        'description',
        'published',
        'promotinal_video_url',
        'poster',
        'meta_keywords',
        'meta_description',
        'slug',
        'price',
        'final_price',
        'discount_expiry_date',
        'time',
        'total_questions_count',
        'subject_id',
        'grade_id',
        'user_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function owners(){
        return $this->belongsToMany(User::class, 'lecture_users', 'lecture_id', 'user_id');
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function parts(){
        return $this->belongsToMany(Part::class,'lecture_parts','lecture_id','part_id');
    }
}
