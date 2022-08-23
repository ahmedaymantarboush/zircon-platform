<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'lecture_id',
        'user_id',
    ];
}
