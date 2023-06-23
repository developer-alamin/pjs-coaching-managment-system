<?php

namespace App\Http\Controllers\backendController;

use Session;
use App\Models\admin;
use App\Models\depart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class departmentController extends Controller
{
   public function depertment($value='')
   {
      $data = array();
      if (Session::has('adminId')) {
         $data = admin::where('id',Session::get('adminId'))->first();
         return view('admin.department',compact('data'));
      }
   }

   public function storeDepart(Request $request)
   {
   		$request->validate([
   			'depart_name'=> 'unique:depart_table'
   		]);

   		try {
          depart::insert([
            'depart_name' => Str::ucfirst($request->depart_name),
            'depart_date' => $request->depart_date
          ]);

          return back()->with('success','Department Add Success'); 
        } catch (Exception $e) {
           return redirect()->back()->with('error','Department Add Faild');
        }

   }
   public function showDepart($value='')
   {
   		$result = depart::all();
   		return $result;
   }

   public function departupdateShow(Request $request)
   {
   		$showId = $request->id;
   		$showData = depart::where('id',$showId)->get();
   		return $showData;
   }



   public function departUpdate(Request $req)
   {

   		$updateid = $req->updateId;

   		$update = DB::table('depart_table')->where('id',$updateid)->update([
   			'depart_name' => Str::ucfirst($req->upDepartName),
   			'depart_date' => $req->updepartDate
   		]);

   		return $update;
   }


   public function departDelete(Request $req)
   {
   		$deleteid = $req->id;

   		$delete = depart::where('id',$deleteid)->delete();
   		return $delete;
   }
}
