<?php

namespace App\Http\Controllers\fontendController;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Support\Facades\Hash;

class studentLoginController extends Controller
{
    function studentLogin(){
        return view('fontend.login');
    }
    function studentloginStore(Request $request){
        $studentLoginId = $request->loginStudentId;
        $studentLoginPass = $request->loginStudentPass;
        $studentData =  student::where('student_studentId',$studentLoginId)->first();

        if((isset($studentData) and ($studentLoginId == $studentData->student_studentId))){
           if (Hash::check($studentLoginPass,$studentData->student_pass)) {
            if ($studentData->student_email_verified_at == null) {
                return back()->with('faild',$studentData->student_name.' Please Your Mail Check The Email Verify Before Login');
            } else {
                $request->Session()->put('studentid',$studentData->student_studentId);
                return redirect(route('student.profile'));
            }
            
           }else{
            return back()->with('faild',$studentData->student_name.' Please ! Incorrect Password');
           }
        }else{
            return back()->with('faild','Please ! Incorrect Student Id');
        }
    }
}
