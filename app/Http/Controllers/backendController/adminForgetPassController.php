<?php

namespace App\Http\Controllers\backendController;

use Hash;
use App\Models\admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\adminPassReset;
use App\Mail\adminPasswordReset;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class adminForgetPassController extends Controller
{
    function getForgetPassword(){
        return view('admin.forgetPassword');
    }

    function adminPostForgetPass(Request $request){
        $adminData = admin::where('admin_email',$request->adminForgetPass)->first();
       if ((isset($adminData) and ($adminData->admin_email == $request->adminForgetPass)) == true) {
            $adminResetCode = Str::random(40);
            adminPassReset::create([
                'reset_token' =>$adminResetCode,
                'admin_id' => $adminData->id
            ]);
            Mail::to($adminData->admin_email)->send(new adminPasswordReset($adminData,$adminResetCode));
            return redirect()->back()->with('success',"Congratulations ".$adminData->admin_name." we've sent a password reset link to it.");
       }else{
        return redirect()->back()->with('faild','Sorry Incorrect Email');
       }
    }

    function getResetPassword($adminResetCode,Request $request){
        $adminPassResetData = adminPassReset::where('reset_token',$adminResetCode)->first();
       if((isset($adminPassResetData) and $adminPassResetData->reset_token == $adminResetCode) == true){
        $adminData = admin::find($adminPassResetData->admin_id);
        return view('admin.resetPassword',compact('adminData','adminResetCode'));
       }else{
            return redirect(route('admin.getForgetPassword'))->with('faild','invalid password reset link or link expired');
       }
    }

    function adminPostRessetPass($adminResetCode,Request $request){
        $adminPassResetData = adminPassReset::where('reset_token',$adminResetCode)->first();
        if ($adminPassResetData->reset_token == $adminResetCode) {
            $adminResetData = admin::findOrFail($adminPassResetData->admin_id);
           if ($adminResetData->admin_email == $request->adminResetEmail) {
            $adminResetData->update([
                'admin_pass' => Hash::make($request->adminResetPass)
            ]);
            $adminPassResetData->delete();
            return redirect(route('admin.Login'))->with('success','Congratulations '.$adminResetData->admin_name.'Your Password Reset Successfylly');
           }else{
            return redirect()->back()->with('error',$adminResetData->admin_name." Sorry ! Your Incorrect Email..Please You Type Of Valid Email");
           }
        }else{
            return redirect(route('admin.getForgetPassword'))->with('faild','invalid password reset link or link expired');
        }
    }
}
