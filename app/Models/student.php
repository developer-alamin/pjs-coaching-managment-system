<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class student extends Model
{
    protected  $table = "student_tb";
    protected $fillable = [
        'student_name',
        'student_fname',
        'student_mname',
        'student_email',
        'student_studentId',
        'student_phone',
        'student_post',
        'student_category',
        'student_class',
        'student_taka',
        'student_village',
        'student_pass',
        'student_img',
        'student_date'
    ];

    
    public function studentEmailVerify(): HasOne
    {
        return $this->hasOne(studentVerify::class);
    }
}
