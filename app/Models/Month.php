<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Month extends Model
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
        'duration',
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

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function owners(){
        return $this->belongsToMany(User::class, 'month_users', 'month_id', 'user_id');
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
