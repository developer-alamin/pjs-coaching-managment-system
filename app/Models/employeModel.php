<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeModel extends Model
{
    protected  $table = "employees";
    protected  $primiaryKey = 'id';
    public  $incrementing = true;
    protected  $KeyType = 'int';
    public  $timestamps = false;
}
