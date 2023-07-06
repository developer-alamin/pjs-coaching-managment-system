<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class adminProfileController extends Controller
{
   function adminProfile(){
        $data = array();
        if(Session::has('adminId')){
            $data = admin::where('id',Session::get('adminId'))->first();
            return view('admin.adminProfile',compact('data'));
        }
   }

   function adminProUpShow(Request $request){
        $adminProUpId = $request->id;
        $adminProUpEmail = $request->email;
        $adminData = admin::where('id',$adminProUpId)
        ->where('admin_email',$adminProUpEmail)->get();
        return response()->json([
            'status'=>200,
            'data'=>$adminData
        ]);
   }

   function adminProUpdate(Request $request){
        if($request->hasFile('adminUpImg')){
            
            $file = $request->file('adminUpImg');

            $http = $_SERVER['HTTP_HOST'];
            $addimg = "http://".$http."/storage/img/";

        
            $addFileName = $addimg.time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
            $fileName = time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/img/',$fileName);

            $updatePreImg = $request->preImg;
            $updateExplode = explode('/', $updatePreImg);
            $updateEnd = end($updateExplode);
            $secondEnd = prev($updateExplode);
            $lasEnd = prev($updateExplode);
            Storage::deleteDirectory('public/img/'.$lasEnd);
        }else{
            $addFileName = $request->preImg;
        }
        $adminProUp = admin::findOrFail($request->updateId);
        $adminProUp->admin_name = $request->AdminUpName;
        $adminProUp->admin_email = $request->AdminUpEmail;
        $adminProUp->admin_mobile = $request->AdminUpPhone;
        $adminProUp->admin_village = $request->AdminUpVillage;
        $adminProUp->admin_post = $request->AdminUpPost;
        $adminProUp->admin_about = $request->adminUpAbout;
        $adminProUp->admin_img = $addFileName;
       return response()->json([
        'status'=>200,
        'data'=>$adminProUp->update()
       ]);
   }
}
