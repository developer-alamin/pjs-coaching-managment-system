<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\addModel;

class sevenController extends Controller
{
    public function seven($value='')
    {
    	return view('seven');
    }

    public function getSeven(Request $req)
    {
    	$getSeven = addModel::where('class','Seven')->get();
    	return $getSeven;
    }

    public function sevenEditShow(Request $req)
    {
    	$id = $req->id;
    	$data = addModel::where('id',$id)->get();
    	return $data;
    }

     public function sevenUpdate(Request $request)
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
           

            $update = addModel::where('id',$request->updateId)->update([
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
            $update = addModel::where('id',$request->updateId)->update([
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

     public function sevenDelete(Request $request)
    {
    		$deleteId = $request->id;
           $delete = addModel::find($deleteId);
           $deleteImg = $delete->img;

           $explode = explode('/',$deleteImg);
           $imgEnd = end($explode);

          if (Storage::delete('public/img/'.$imgEnd)) {
            $dataDelete = addModel::destroy($deleteId);
          }
          return $dataDelete;
    }




}
