<?php

namespace App\Http\Controllers\fontendController;

use Session;
use App\Models\student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class studentProfileController extends Controller
{
    function studentProfile(){
        $data = array();
        if(Session::has('studentid')){
            $data = student::where('student_studentId',Session::get('studentid'))->first();
            return view('fontend.studentProfile',compact('data'));
        }
       
    }
    function studentLogout(){
        if (Session::has('studentid')) {
            Session::pull('studentid');
            return redirect(route('student.login'));
        }
    }
}
