<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class register extends Controller
{
	public function addregister($value='')
	{
		return view('addregister');
	}
    public function viewregister($value='')
    {
    	return view('viewregister');
    }

    
}
