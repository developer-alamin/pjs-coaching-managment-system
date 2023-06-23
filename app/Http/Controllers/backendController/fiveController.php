<?php

namespace App\Http\Controllers\backendController;

use Session;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class fiveController extends Controller
{
    public function five($value='')
    {
        $data = array();
        if (Session::has('adminId')) {
           $data = admin::where('id',Session::get('adminId'))->first();
           return view('admin.five',compact('data'));
        }
    }


    public function getFive(Request $req)
    {
    	$getFive = student::where('student_class','Five')->get();
    	return $getFive;
    }


    public function fiveEditShow(Request $req)
    {
    	$id = $req->input('id');

    	$EditFiveShow = student::where('id',$id)->get();
    	return $EditFiveShow;
    }

    public function fiveUpdate(Request $request)
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


    public function FiveDelete(Request $req)
    {
           $deleteId = $req->id;
           $delete = student::find($deleteId);
           $deleteImg = $delete->student_img;

           $explode = explode('/',$deleteImg);
           $imgEnd = end($explode);
           $imgSecondEnd = prev($explode);
           $imgLastEnd = prev($explode);

          if (Storage::deleteDirectory('public/img/'.$imgLastEnd)) {
            $dataDelete = student::destroy($deleteId);
          }
          return $dataDelete;

    }

}

