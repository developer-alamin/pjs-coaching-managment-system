<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\admin;
use Illuminate\Support\Facades\Storage;

class sixController extends Controller
{
     public function six($value='')
    {
        $data = array();
      if (Session::has('adminId')) {
         $data = admin::where('id',Session::get('adminId'))->first();
         return view('admin.six',compact('data'));
      }
    }

    public function getSix(Request $req)
    {
    	$getSix = student::where('student_class','Six')->get();
    	return $getSix;
    }
    public function sixEditShow(Request $req)
    {
    	$id = $req->input('id');
    	$data = student::where('id',$id)->get();
    	return $data;
    }


    public function sixUpdate(Request $request)
    {
    	if ($request->hasFile('upimg')) {

            $file = $request->file('upimg');
            $http = $_SERVER['HTTP_HOST'];
            $addimg = "http://".$http."/storage/img/";

            $file = $request->file('upimg');
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

        $update = student::where('id',$request->updateId)->update([
            'student_name'=>$request->upname,
            'student_fname'=>$request->upfname,
            'student_mname'=>$request->upmname,
            'student_email'=>$request->upemail,
            'student_studentId'=>$request->upstudentid,
            'student_phone'=>$request->upphone,
            'student_post'=>$request->uppost,
            'student_category'=>$request->upcategory,
            'student_class'=>$request->upclass,
            'student_taka'=>$request->uptaka,
            'student_village'=>$request->upvillage,
            'student_img'=>$addFileName
        ]);

        return $update;
    }


    public function sixDelete(Request $request)
    {
    		$deleteId = $request->id;
           $delete = student::find($deleteId);
           $deleteImg = $delete->student_img;

           $explode = explode('/',$deleteImg);
           $imgEnd = end($explode);

          if (Storage::delete('public/img/'.$imgEnd)) {
            $dataDelete = student::destroy($deleteId);
          }
          return $dataDelete;
    }
}
