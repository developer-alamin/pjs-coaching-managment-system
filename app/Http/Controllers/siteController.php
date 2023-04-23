<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\studentRegister;

use App\Models\testModel;



class siteController extends Controller
{
  public function test($value='')
  {
  	return view('test');
  }


  public function CreateTest(Request $req)
  {
  	/*$req->validate([
      'name' => 'required|max:200|unique:test',
      'cate' => 'required',
      'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
    ]);*/

    try {
      $http = $_SERVER['HTTP_HOST'];
      $addimg = "http://".$http."/storage/test/";
      $uppath = $addimg.time().'.'.$req->file('image')->getClientOriginalExtension();
      $namepath = time().'.'.$req->file('image')->getClientOriginalExtension();

      $req->file('image')->storeAs('public/test',$namepath);

      testModel::insert([
          'name' => $req->name,
          'cate' => $req->cate,
          'image' => $uppath,
          'password' => bcrypt($req->password)
      ]);
     return back()->with('success','Successfully registered a new student!');   
    } catch (Exception $e) {
      return redirect()->back()->with('error','Something goes wrong while uploading file!');
    }

     
  }


  public function photo($value='')
  {
    echo 'storage';
  }



}
