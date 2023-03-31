<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\addModel;

class addController extends Controller
{
    public function register(Request $request)
    {

        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/img/";

    	$file = $request->file('img');
        $addFileName = $addimg.time().'.'.$file->getClientOriginalExtension();
   		$fileName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img',$fileName);


        $data = addModel::insert([
        	'name' => $request->name,
        	'fname' => $request->fname,
        	'mname' => $request->mname,
        	'email' => $request->email,
        	'studentId' => $request->studentid,
        	'phone' => $request->phone,
        	'post' => $request->post,
            'category'=>$request->category,
        	'class' => $request->class,
        	'taka' => $request->taka,
        	'village' => $request->village,
        	'pass' => $request->pass,
        	'Conpass' => $request->conpass,
        	'img' => $addFileName,
        	'date' => $request->date
        ]);


		if ($data == true) {
			return 1;
		}else{
			return 0;
		}
    }


    public function getregister(Request $req)
    {

        $all = addModel::all();
        return $all;
        
    }


    public function studentDelete(Request $req)
    {
       $delete = DB::table('student')->truncate();
       if ($delete == true) {
           return 1;
       }else{
        return 0;
       }
    }



}
