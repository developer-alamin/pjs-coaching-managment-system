<?php

namespace App\Http\Controllers\fontendController;
use Hash;
use Carbon\Carbon;
use App\Models\student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\stdentPassReset;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\studentPasswordResetMail;

class studentForgetController extends Controller
{
    function getForgerPassword(){
        return view('fontend.studentForgetPass');
    }
    function PostStudentForgetPass(Request $request){
        $forgetEmail = $request->stuForgetEmail;
        $Student = student::where('student_email',$forgetEmail)->first();
       if (isset($Student) == true) {
         $stuResetCode = Str::random(40);
         stdentPassReset::create([
            'reset_code' => $stuResetCode,
            'student_id' =>$Student->id
         ]);
         Mail::to($Student->student_email)->send(new studentPasswordResetMail($stuResetCode,$Student));
         return redirect()->back()->with('success','Hello '.$Student->student_name.' We Have Sent You A Password Reset Link.Please Check Your Email');
       }else{
        return redirect()->back()->with('faild','Please Enter A Valid Email Address');
       }
    }

    function getresetPassword($stuResetCode){
       $stuPassResetdata =  stdentPassReset::where('reset_code',$stuResetCode)->first();
       $studentData = student::find($stuPassResetdata->student_id);
       if($stuPassResetdata || Carbon::now()->subMinutes(10) > $stuPassResetdata->created_at){
        return view('fontend.resetPassword',compact('stuResetCode','studentData'));
       }else {
        return redirect(route('student.forgerPassword'))->with('faild','invalid password reset link or link expired');
       }
    }

    function studentPostResetPass($stuResetCode,Request $request){
        $stuPassResetdata =  stdentPassReset::where('reset_code',$stuResetCode)->first();
        if ($stuPassResetdata ||  Carbon::now()->subMinutes(10) > $stuPassResetdata->created_at) {

          $ResetStuData = student::find($stuPassResetdata->student_id);

          if (!($ResetStuData->student_email == $request->stuResetEmail)) {
            return redirect()->back()->with('error', $ResetStuData->student_name.' Sorry ! Please Incorrect Email');
          }else{
            $stuPassResetdata->delete();
            $ResetStuData->update([
                'student_pass'=>Hash::make($request->stuResetPass)
            ]);
            return redirect()->route('student.login')->with('success',$ResetStuData->student_name.' Your Password Reset Success ! Please Login');
          }

        }else{
            return redirect(route('student.forgerPassword'))->with('faild','invalid password reset link or link expired');
        }
    }
}
