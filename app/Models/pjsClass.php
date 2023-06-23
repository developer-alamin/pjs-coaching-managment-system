<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pjsClass extends Model
{
    use HasFactory;
    protected $table = "class_table";
     protected $fillable = [
        'class_name', 'class_date'
    ];
}
