<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stdentPassReset extends Model
{
    use HasFactory;
    protected $table = "stdent_pass_resets";
    protected $fillable = [
        'reset_code',
        'student_id'
    ];
}
