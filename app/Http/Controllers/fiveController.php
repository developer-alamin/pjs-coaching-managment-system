<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentRegister;
use Illuminate\Support\Facades\Storage;


class fiveController extends Controller
{
    public function five($value='')
    {
    	return view('five');
    }


    public function getFive(Request $req)
    {
    	$getFive = studentRegister::where('class','Five')->get();
    	return $getFive;
    }


    public function fiveEditShow(Request $req)
    {
    	$id = $req->input('id');

    	$EditFiveShow = studentRegister::where('id',$id)->get();
    	return $EditFiveShow;
    }

    public function fiveUpdate(Request $request)
    {

             
        if ($request->hasFile('upimg')) {

            $file = $request->file('upimg');

            $http = $_SERVER['HTTP_HOST'];
            $addimg = "http://".$http."/storage/img/";

            $addFileName = $addimg.time().'.'.$file->getClientOriginalExtension();
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/img',$fileName);

            $updatePreImg = $request->preImg;
            $updateExplode = explode('/', $updatePreImg);
            $updateEnd = end($updateExplode);
            Storage::delete('public/img/'.$updateEnd);
           

            $update = studentRegister::where('id',$request->updateId)->update([
                'name'=>$request->upname,
                'fname'=>$request->upfname,
                'mname'=>$request->upmname,
                'email'=>$request->upemail,
                'studentId'=>$request->upstudentid,
                'phone'=>$request->upphone,
                'post'=>$request->uppost,
                'category'=>$request->upcategory,
                'class'=>$request->upclass,
                'taka'=>$request->uptaka,
                'village'=>$request->upvillage,
                'img'=>$addFileName
            ]);

        }else{
            $update = studentRegister::where('id',$request->updateId)->update([
                'name'=>$request->upname,
                'fname'=>$request->upfname,
                'mname'=>$request->upmname,
                'email'=>$request->upemail,
                'studentId'=>$request->upstudentid,
                'phone'=>$request->upphone,
                'post'=>$request->uppost,
                'category'=>$request->upcategory,
                'class'=>$request->upclass,
                'taka'=>$request->uptaka,
                'village'=>$request->upvillage
            ]);
        }

        return $update;
    }


    public function FiveDelete(Request $req)
    {
           $deleteId = $req->id;
           $delete = studentRegister::find($deleteId);
           $deleteImg = $delete->img;

           $explode = explode('/',$deleteImg);
           $imgEnd = end($explode);

          if (Storage::delete('public/img/'.$imgEnd)) {
            $dataDelete = studentRegister::destroy($deleteId);
          }
          return $dataDelete;

    }

}

