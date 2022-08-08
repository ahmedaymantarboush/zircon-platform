<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    public function govenrnorate(){
        return $this->belongsTo(Governorate::class);
    }
}
