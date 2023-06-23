<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depart extends Model
{
    use HasFactory;

     protected $table = "depart_table";
     protected $fillable = [
        'depart_name', 'depart_date'
    ];
}
