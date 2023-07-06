<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Models\admin;
use App\Models\student;
use Illuminate\Http\Request;
use App\Mail\StudentUpdateMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class nonVerifyController extends Controller
{
    function nonVerify(){
        $data = array();
        if(Session::has('adminId')){
            $data = admin::where('id',Session::get('adminId'))->first();
            return view('admin.nonVerify',compact('data'));
        }
    }

    function getNonVerifyStu(){
       $nonVerifyData = student::where('student_email_verified_at',null)->get();
       return response()->json([
        'status'=>200,
        'data'=>$nonVerifyData->toArray()
       ]);
    }

    function nonVerifyEmailShow(Request $request){
         $verifyStuId = $request->verifyId;
         $verifyStudata = student::where('student_studentId',$verifyStuId)->first();
         return response()->json([
            'status'=>200,
            'data'=>$verifyStudata
         ]);
    }

    function adminNonVerifyStu(Request $request){
        $nonVerifyUpId =  $request->nonVerifyUpId;
        $nonVerifyUpEmail = $request->nonVerifyEmail;
        $nonVerifyStuData = student::findOrFail($nonVerifyUpId);

        if ($nonVerifyStuData->student_email ==  $nonVerifyUpEmail) {
          return '404';
        }
        $nonVerifyStuData->student_email = $nonVerifyUpEmail;

        Mail::to($nonVerifyUpEmail)->send(new StudentUpdateMail($nonVerifyStuData));
        return response()->json([
            'status'=>200,
            'data' => $nonVerifyStuData->update()
        ]);
    }
}
