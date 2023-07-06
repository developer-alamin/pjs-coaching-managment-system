<?php

namespace App\Http\Controllers\backendController;

use Session;
use Hash;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\studentRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class adminLoginController extends Controller
{
  public function test($value='')
  {
  	return view('admintest');
  }

  public function adminLogin($value='')
  {
    return view('admin.admin');
  }
  function adminStoreLogin(Request $request){

    $adminEmail = $request->adminEmail;
    $adminPass = $request->adminpass;
    $adminLogindata = admin::where('admin_email',$adminEmail)->first();
    if((isset($adminLogindata) and $adminEmail == $adminLogindata->admin_email)){
      if (Hash::check($adminPass,$adminLogindata->admin_pass)) {
          $request->Session()->put('adminId',$adminLogindata->id);
           return redirect(route('admin.home'))->with('success','Login SuccessFully');
      }else{
        return back()->with('faild','please Incorrect Password');
      }
    }else{
      return back()->with('faild','please it is only for admin..Student Not Allow');
    }
  }
  function adminLogout(){
    if(Session::has('adminId')){
      Session::pull('adminId');
      return redirect(route('admin.Login'));
    }
  }

}
