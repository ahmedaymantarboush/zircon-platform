<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'url',
        'time',
        'type',
        'semester',
        'description',
        'exam_id',
        'min_percentage',
        'part_id',
        'month_id',
        'grade_id'
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
    public function publisher()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
