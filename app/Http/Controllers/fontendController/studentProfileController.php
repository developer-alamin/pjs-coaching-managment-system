<?php

namespace App\Http\Controllers\fontendController;

use Session;
use App\Models\taka;
use App\Models\depart;
use App\Models\invoice;
use App\Models\student;
use App\Models\pjsClass;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class studentProfileController extends Controller
{
    function studentProfile(){
        $data = array();
        if(Session::has('studentid')){
            $studentId = Session::get('studentid');
            $invoiceMonth = DB::table('invoices')->groupBy('invoice_month')->get();
            $invoiceDue = invoice::where('invoice_id',$studentId)->sum('invoice_due');
            $monthDue = invoice::where('invoice_id',$studentId)
            ->where('invoice_status',0)
            ->get();

            $taka = taka::all();
            $class = pjsClass::all();
            $depart = depart::all();

            $data = student::where('student_studentId',$studentId)->first();
            return view('fontend.studentProfile',compact('data','invoiceMonth','invoiceDue','monthDue','taka','class','depart'));
        }
       
    }

    function filterData(Request $request){
        $invoiceId = $request->stuProShowInId;
        $invoiceMonth = $request->monthSelect;
        $Filterdata = DB::table('invoices')
        ->where('invoice_id',$invoiceId)
        ->where('invoice_month',$invoiceMonth)
        ->get();
         return response()->json([
			'status' => 200,
            'data' => $Filterdata,
		]);
         
    }

    function stuProEditShow(Request $request){
       $stuProEditShowId =  $request->stuProUpShowId;
        $stuShowData = student::where('student_studentId',$stuProEditShowId)->first();
        return response()->json([
            'status'=>200,
            'data' => $stuShowData
        ]);
    }

    function stuProUpdate(Request $request){
        
        if ($request->hasFile('stuProUpImg')) {

            $http = $_SERVER['HTTP_HOST'];
            $addimg = "http://".$http."/storage/img/";

            $file = $request->file('stuProUpImg');

            $addFileName = $addimg.time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
            $fileName = time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
           $file->storeAs('public/img/',$fileName);

            $updatePreImg = $request->stuProPreImg;
            $updateExplode = explode('/', $updatePreImg);
            $updateEnd = end($updateExplode);
            $secondEnd = prev($updateExplode);
            $lasEnd = prev($updateExplode);
            Storage::deleteDirectory('public/img/'.$lasEnd);

        }else{
            $addFileName = $request->stuProPreImg;
        }

        $stuProId = $request->stuProUpId;
        $stuProData =  student::findOrFail($stuProId);

        $stuProData->student_name = $request->stuProUpName;
        $stuProData->student_fname = $request->stuProUpfname;
        $stuProData->student_mname = $request->stuProUpMother;
        $stuProData->student_phone = $request->stuProUpPhone;
        $stuProData->student_post = $request->stuProUpPost;
        $stuProData->student_category = $request->stuProUpCate;
        $stuProData->student_class = $request->stuProUpClass;
        $stuProData->student_taka = $request->stuProUpTaka;
        $stuProData->student_village = $request->stuProUpVil;
        $stuProData->student_img = $addFileName;

        $stuProData->update();

    }

    function studentLogout(){
        if (Session::has('studentid')) {
            Session::pull('studentid');
            return redirect(route('student.login'));
        }
    }
}
