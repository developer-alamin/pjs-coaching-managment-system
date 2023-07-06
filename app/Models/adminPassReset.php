<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminPassReset extends Model
{
    use HasFactory;

    protected $fillable = [
        'reset_token',
        'admin_id'
    ];
}
