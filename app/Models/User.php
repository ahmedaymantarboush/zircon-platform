<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'parent_phone_number',
        // 'image',
        'password',
        'balance',
        'role_num',
        'grade_id',
        'governorate_id',
        'code',
        'center_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class,'role_num','number');
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function createdLectures(){
        return $this->hasMany(Lecture::class);
    }

    public function ownedLectures(){
        return $this->belongsToMany(Lecture::class,'lecture_users','user_id','lecture_id');
    }

    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'user_subjects','user_id','subject_id');
    }

    public function answerdQuestions(){
        return $this->hasMany(AnswerdQuestion::class);
    }

    public function passedExams(){
        return $this->hasMany(PassedExam::class);
    }

    public function devices(){
        return $this->hasMany(Device::class);
    }
}
