<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home($value='')
    {
        $data = array();
        if (Session::has('adminId')) {
           $data = admin::where('id',Session::get('adminId'))->first();
           return view('admin.home',compact('data'));
        }

    }
    
}
