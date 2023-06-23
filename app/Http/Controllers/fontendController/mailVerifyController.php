<?php

namespace App\Http\Controllers\fontendController;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use App\Models\studentVerify;
use Carbon\Carbon;

class mailVerifyController extends Controller
{
    function emailverify($token){
       $verifyToken = studentVerify::where('student_token',$token)->first();
       if(isset( $verifyToken)){
         $studentVerify = $verifyToken->student;
         if (!($studentVerify->student_email_verified_at) and $studentVerify->student_email_verified_at == null) {
             $studentVerify->student_email_verified_at = Carbon::now();
             $studentVerify->save();
             return redirect(route('student.login'))->with('success','Your Email Verifyed');
         }else{
           return redirect(route('student.login'))->with('faild','Your Eamil Already Verifyed');
         }

       }else {
         return redirect(route('student.login'))->with('faild','Please Registration Then Eamil Verify');
       }
       
    }
}
