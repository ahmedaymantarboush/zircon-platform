<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturePart extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id',
        'part_id',
    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
