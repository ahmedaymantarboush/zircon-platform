<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'url',
        'image',
        'governorate_id'
    ];
    public function govenrnorate(){
        return $this->belongsTo(Governorate::class,'governorate_id');
    }
}
