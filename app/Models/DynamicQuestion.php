<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'part_id',
        'count',
        'level',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }
}
