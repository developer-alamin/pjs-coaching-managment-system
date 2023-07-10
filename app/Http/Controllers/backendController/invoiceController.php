<?php

namespace App\Http\Controllers\backendController;
use Hash;
use Session;
use Exception;
use Carbon\Carbon;
use App\Models\admin;
use App\Models\invoice;
use App\Models\student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class invoiceController extends Controller
{
   function invoice(){
        $data = array();
        if(Session::has('adminId')){
            $curentTime = Carbon::now()->format('M-Y');
            $totalAmountDue = invoice::where('invoice_month',$curentTime)->sum('invoice_due');
            $data = admin::where('id',Session::get('adminId'))->first();
            return view('admin.invoice',compact('data','totalAmountDue'));
        }
   }
   function storInvoice(Request $request){
        $request->validate([
            'invoice_month'=>'required',
            'invoice_month'=>'unique:invoices'
        ],[
            'invoice_month.required' => "Name is Required",
            'invoice_month.unique' => "present month student invoice already send.."
        ]);

        try {
            $student = student::all();
            foreach ($student as $key => $student) {
                $invoice = new invoice();

                $invoice->invoice_name = $student->student_name;
                $invoice->invoice_id = $student->student_studentId;
                $invoice->invoice_taka = $student->student_taka;
                $invoice->invoice_due = $student->student_taka;
                $invoice->invoice_month =  $request->invoice_month;
                $invoice->invoice_status = '0';
                $invoice->invoice_type = 'Month';
                $invoice->invoice_note = 'lorem';
                $invoice->save();
            } 
         return back()->with('success','PJS Student Invoice Data Send SuccessFully');
        } catch (Exception $th) {
            return back()->with('faild','PJS Student Invoice Data Send Faild');
        }
   }

    function test(){

        $aaa = array();
        $aaa = invoice::groupBy('invoice_month')->get();
       
       foreach($aaa as $key => $aaa){
            $month = $aaa->invoice_month.' ';
            echo $month;
       }
    

    }

    function letestInvoice(){
        $letestMonth = Carbon::now()->format('M-Y');
        $invoiceLetestData = invoice::where('invoice_month',$letestMonth)
        ->get();
        return $invoiceLetestData;
   }

   function invoiceUpdateShoe(Request $request){
        $showId = $request->id;
       $invoiceUpshowData = invoice::where('id',$showId)->get();
       return $invoiceUpshowData;
   }

   function invoiceUpdate(Request $request){
    $invoiceUpId = $request->invoiceupdateId;
    $invoiceTaka = $request->invoiceHiddTaka;
    $updateData = invoice::findOrFail($invoiceUpId);
    if ($request->upinvoiceStatus == "Unpaid") {
        $updateData->invoice_status = 0;
        $updateData->invoice_due = $invoiceTaka;
    }else{
        $updateData->invoice_status = 1;
        $updateData->invoice_due = 0;
    }
    $updateData->update();
   }

   function selectInvoiceMonth(){
        $data = array();
        if(Session::has('adminId')){
            $data = admin::where('id',Session::get('adminId'))->first();
            $invoiceData = invoice::select('invoice_month')->groupBy('invoice_month')->orderBy('id','desc')->get();
            
            return view('admin.invoiceSelectMonth',compact('data','invoiceData'));

        }
   }

   function totalAmountDue(){
        $curentTime = Carbon::now()->format('M-Y');
        $totalAmountDue = invoice::where('invoice_month',$curentTime)->sum('invoice_due');
        return $totalAmountDue;
   }
   function viewInoiceData($month){
        $data = array();
        if(Session::has('adminId')){
            $studentId = student::all();
            $data = admin::where('id',Session::get('adminId'))->first();
            $invoiceMonthData =  invoice::where('invoice_month',$month)->get();
            $monthTotalDue = invoice::where('invoice_month',$month)->sum('invoice_due');
            return view('admin.viewInvoiceMonth',compact('data','invoiceMonthData','monthTotalDue','studentId'));
        }   
   }

   function dueInvoiceDataShow(Request $request){
         $dueInvShowId = $request->ShowId;
         $dueInvShowMonth = $request->showMonth;
         $dueInvShowData = invoice::where('invoice_id',$dueInvShowId)
         ->where('invoice_month',$dueInvShowMonth)->get();
         return response()->json([
            'status'=>200,
            'data'=>$dueInvShowData
         ]);
   }

   function dueInvoiveUpdate(Request $request){
        $dueInvUpid = $request->dueInvUpdateId;
        $dueInvUptaka = $request->dueInvUpTaka;
        $dueInvUpMonth = $request->dueInvUpMonth;
        $dueInvUpStatus = $request->updueInvStatus;

        $dueInvFindData = invoice::findOrFail($dueInvUpid);

       if ($dueInvUpStatus == "Unpaid") {
            $dueInvFindData->invoice_status = 0;
            $dueInvFindData->invoice_due = $dueInvUptaka;
       }else{
             $dueInvFindData->invoice_status = 1;
            $dueInvFindData->invoice_due = 0;
       }

       return response()->json([
        'status'=>200,
        'data'=>$dueInvFindData->update()
       ]);
   }
}
