<?php

namespace App\Http\Controllers\backendController;
use App\Http\Controllers\Controller;

use Session;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\pjsClass;

class classController extends Controller
{
    public function addClass($value='')
    {
      $data = array();
      if (Session::has('adminId')) {
         $data = admin::where('id',Session::get('adminId'))->first();
         return view('admin.class',compact('data'));
      }
    }

   public function getClass($value='')
   {
   	 return pjsClass::all();
   }

   public function storClass(Request $req)
   {
   		$req->validate([
   			'class_name'=> 'unique:class_table'
   		]);

   		try {
          pjsClass::insert([
            'class_name' => Str::ucfirst($req->class_name),
            'class_date' => $req->class_date
          ]);

          return back()->with('success','Class Add Success'); 
        } catch (Exception $e) {
           return redirect()->back()->with('error','Class Add Faild');
        }
   }

   public function UpdateShow(Request $req)
   {
   		return pjsClass::where('id',$req->id)->get();
   }

   public function classUpdate(Request $req)
   {

   		$update = DB::table('class_table')
              ->where('id',$req->updateId)
              ->update([
              	'class_name' => $req->upClassName,
   			'class_date' => $req->upClasdate
   		]);

   		return $update;
   }

   public function classDelete(Request $req)
   {
   		$deleteId = $req->id;;

   		$delete =  pjsClass::where('id',$deleteId)->delete();
   		return $delete;
   }


}
