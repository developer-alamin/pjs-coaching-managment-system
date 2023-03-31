<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addModel extends Model
{
    protected  $table = "student";
    protected  $primiaryKey = 'id';
    public  $incrementing = true;
    protected  $KeyType = 'int';
    public  $timestamps = false;
}
