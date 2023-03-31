<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class register extends Controller
{
    public function register($value='')
    {
    	return view('register');
    }

    
}
