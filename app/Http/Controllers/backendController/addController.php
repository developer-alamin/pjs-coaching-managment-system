<?php

namespace App\Http\Controllers\backendController;

use Hash;
use App\Models\student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\studentSendMail;
use App\Models\studentVerify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class addController extends Controller
{
    public function storeRegister(Request $request)
    {

        $request->validate([
          'student_email' => 'unique:student_tb',
          'student_studentId' => 'unique:student_tb',
          'student_phone' => 'unique:student_tb',
          'image' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/img/";

    	  $file = $request->file('image');
        $addFileName = $addimg.time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
   		  $fileName = time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img/',$fileName);

        try {
         $students = student::create([
            'student_name' => $request->name,
            'student_fname' => $request->fname,
            'student_mname' => $request->mname,
            'student_email' => $request->student_email,
            'student_studentId' => $request->student_studentId,
            'student_phone' => $request->student_phone,
            'student_post' => $request->post,
            'student_category'=>$request->category,
            'student_class' => $request->class,
            'student_taka' => $request->taka,
            'student_village' => $request->village,
            'student_pass' => Hash::make($request->password),
            'student_img' => $addFileName
          ]);

          studentVerify::create([
            'student_token' => Str::random(40),
            'student_id' => $students->id
          ]);
          
          Mail::to($students->student_email)->send(new studentSendMail($students));
          
          return back()->with('success','Congratulations '.$students->student_name.' On Registration...Check Your Email To Verify Account'); 
        } catch (Exception $e) {
           return redirect()->back()->with('error','Sorry ! '.$request->name.'You failed to register..please try again');
        }
    }


    public function getregister(Request $req)
    {
        $all = student::all();
        return $all;
    }


    public function studentDelete(Request $req)
    {
       $delete = DB::table('student_tb')->truncate();
       if ($delete == true) {
           return 1;
       }else{
        return 0;
       }
    }



}
