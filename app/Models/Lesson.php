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
        'duration',
        'type',
        'semester',
        'description',
        'exam_id',
        'min_percentage',
        'part_id',
        'month_id',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}
