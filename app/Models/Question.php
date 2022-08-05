<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
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

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
