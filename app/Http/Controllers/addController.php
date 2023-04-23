<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\studentRegister;

class addController extends Controller
{
    public function storeRegister(Request $request)
    {

        $request->validate([
          'email' => 'unique:student',
          'studentid' => 'unique:student',
          'phone' => 'unique:student',
          'image' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/img/";

    	  $file = $request->file('image');
        $addFileName = $addimg.time().'.'.$file->getClientOriginalExtension();
   		  $fileName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img/',$fileName);

        try {
          studentRegister::insert([
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
            'pass' => bcrypt($request->password),
            'img' => $addFileName,
            'date' => $request->date
          ]);

          return back()->with('success','Student Registered Successfully'); 
        } catch (Exception $e) {
           return redirect()->back()->with('error','Student Registered Faild');
        }
    }


    public function getregister(Request $req)
    {

        $all = studentRegister::all();
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
