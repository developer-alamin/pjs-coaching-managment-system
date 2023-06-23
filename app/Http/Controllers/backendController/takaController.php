<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\taka;
use App\Models\admin;

class takaController extends Controller
{
   public function taka($value='')
   {
      $data = array();
      if (Session::has('adminId')) {
         $data = admin::where('id',Session::get('adminId'))->first();
         return view('admin.taka',compact('data'));
      }
   }

   public function storeTaka(Request $req)
   {
   		$req->validate([
   			'pjs_taka'=> 'unique:pjs_taka'
   		]);

   		try {
          taka::insert([
            'pjs_taka' => $req->pjs_taka,
            'taka_date' => $req->taka_date
          ]);

          return back()->with('success','Taka Add Success'); 
        } catch (Exception $e) {
           return redirect()->back()->with('error','Taka Add Faild');
        }
   }

   public function showTaka($value='')
   {
   		$result = taka::all();
   		return $result;
   }

   public function takaUpdateShow(Request $req)
   {
   		$show_id = $req->id;
   		$deatils = taka::where('id',$show_id)->get();
   		return $deatils;
   }

   public function takaUpdate(Request $req)
   {
   		$updateId = $req->updateId;

   		$update = DB::table('pjs_taka')->where('id',$updateId)->update([
   			'pjs_taka' => $req->uppjstaka,
   			'taka_date' => $req->uptakadate,
   		]);
   		return $update;
   }

   public function takaDelete(Request $req)
   {
   	   
   	   $delete_id = $req->id;
   	   if ($delete_id == true) {
   	   	$delete = taka::destroy($delete_id);
   	   }
   
   	   return $delete;
   }

}
