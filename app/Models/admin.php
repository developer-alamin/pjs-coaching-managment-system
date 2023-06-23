<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $table = "admin_td";
    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_mobile',
        'admin_village',
        'admin_post',
        'admin_about',
        'admin_img',
        'admin_pass'
    ];
}
