<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory,
        SoftDeletes;
    protected $fillable = [
        'name',
        'text',
        'image',
        'video',
        'audio',
        'type',
        'answer',
        'explanation',
        'choices',
        'level',
        'grade_id',
        'part_id',
        'user_id',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function answers()
    {
        return $this->hasMany(AnswerdQuestion::class, 'question_id');
    }
}
