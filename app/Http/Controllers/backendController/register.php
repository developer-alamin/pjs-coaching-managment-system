<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class register extends Controller
{
	public function addregister($value='')
	{
		$data = array();
		if (Session::has('adminId')) {
			$data = admin::where('id',Session::get('adminId'))->first();
			return view('admin.addregister',compact('data'));
		}
	}
    public function viewregister($value='')
    {
		$data = array();
		if (Session::has('adminId')) {
			$data = admin::where('id',Session::get('adminId'))->first();
			return view('admin.viewregister',compact('data'));
		}
    }

    function studentResgister(){
		return view('fontend.studentRegister');
	}
}
