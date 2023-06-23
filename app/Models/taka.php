<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taka extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "pjs_taka";
     protected $fillable = [
        'pjs_taka', 
        'taka_date'
    ];
}
