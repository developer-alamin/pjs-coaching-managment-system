<?php

use App\Models\student;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\adminMiddleware;
use App\Http\Controllers\backendController\register;
use App\Http\Controllers\backendController\addController;
use App\Http\Controllers\backendController\hscController;
use App\Http\Controllers\backendController\sixController;
use App\Http\Controllers\backendController\sscController;
use App\Http\Controllers\backendController\tenController;
use App\Http\Controllers\backendController\fiveController;
use App\Http\Controllers\backendController\homeController;
use App\Http\Controllers\backendController\nineController;
use App\Http\Controllers\backendController\takaController;
use App\Http\Controllers\backendController\classController;
use App\Http\Controllers\backendController\eightController;
use App\Http\Controllers\backendController\sevenController;
use App\Http\Controllers\backendController\collageController;
use App\Http\Controllers\backendController\invoiceController;
use App\Http\Controllers\backendController\nonVerifyController;
use App\Http\Controllers\backendController\adminLoginController;
use App\Http\Controllers\backendController\departmentController;
use App\Http\Controllers\fontendController\mailVerifyController;
use App\Http\Controllers\backendController\adminProfileController;
use App\Http\Controllers\fontendController\studentLoginController;
use App\Http\Controllers\fontendController\studentForgetController;
use App\Http\Controllers\fontendController\studentProfileController;
use App\Http\Controllers\backendController\adminForgetPassController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Home Page";
});

Route::post('/storeRegister',[addController::class,'storeRegister'])->name('store.register');
 //five Route Work start form here
Route::post('/fiveEditShow',[fiveController::class,'fiveEditShow']);
Route::post('/fiveUpdate',[fiveController::class,'fiveUpdate']);
Route::post('/fiveDelete',[fiveController::class,'fiveDelete']);


//six Route Work start form here

Route::post('/sixEditShow',[sixController::class,'sixEditShow']);
Route::post('/sixUpdate',[sixController::class,'sixUpdate']);
Route::post('/sixDelete',[sixController::class,'sixDelete']);
//six Route Work end form here

/*seven route work start form here*/
Route::post('/sevenEditShow',[sevenController::class,'sevenEditShow']);
Route::post('/sevenUpdate',[sevenController::class,'sevenUpdate']);
Route::post('/sevenDelete',[sevenController::class,'sevenDelete']);
/*seven route work end form here*/

/*eight route work start form here*/
Route::post('/eightEditShow',[eightController::class,'eightEditShow']);
Route::post('/eightUpdate',[eightController::class,'eightUpdate']);
Route::post('/eightDelete',[eightController::class,'eightDelete']);
/*eight route work end form here*/

/*nine route work start form here*/
Route::post('/nineEditShow',[nineController::class,'nineEditShow']);
Route::post('/nineUpdate',[nineController::class,'nineUpdate']);
Route::post('/ninetDelete',[nineController::class,'ninetDelete']);
/*nine route work end form here*/

/*ten route work start form here*/
Route::post('/tenEditShow',[tenController::class,'tenEditShow']);
Route::post('/tenUpdate',[tenController::class,'tenUpdate']);
Route::post('/tentDelete',[tenController::class,'tentDelete']);
/*ten route work end form here*/

/*ssc route work start form here*/
Route::get('/getssc',[sscController::class,'getssc']);
Route::post('/sscEditShow',[sscController::class,'sscEditShow']);
Route::post('/sscUpdate',[sscController::class,'sscUpdate']);
Route::post('/sscDelete',[sscController::class,'sscDelete']);
/*ssc route work end form here*/

/*collage route work start form here*/
Route::post('/collageEditShow',[collageController::class,'collageEditShow']);
Route::post('/collageUpdate',[collageController::class,'collageUpdate']);
Route::post('/collageDelete',[collageController::class,'collageDelete']);
/*collage route work end form here*/

/*hsc route work start form here*/

Route::post('/hscEditShow',[hscController::class,'hscEditShow']);
Route::post('/hscUpdate',[hscController::class,'hscUpdate']);
Route::post('/hscDelete',[hscController::class,'hscDelete']);
/*hsc route work end form here*/

/*classs Route work start form here*/
Route::post('/storClass',[classController::class,'storClass'])->name('stor.class');
Route::post('/UpdateShow',[classController::class,'UpdateShow'])->name('UpdateShow');
Route::post('/classUpdate',[classController::class,'classUpdate']);
Route::post('/classDelete',[classController::class,'classDelete']);
/*classs Route work end form here*/

/*depart Route work start form here*/
Route::post('/storeDepart',[departmentController::class,'storeDepart'])->name('store.depart');
Route::post('/departupdateShow',[departmentController::class,'departupdateShow']);
Route::post('/departUpdate',[departmentController::class,'departUpdate']);
Route::post('/departDelete',[departmentController::class,'departDelete']);
/*depart Route work end form here*/
/*taka route work start form here*/
Route::post('/storeTaka',[takaController::class,'storeTaka'])->name('store.taka');
Route::post('/takaUpdateShow',[takaController::class,'takaUpdateShow']);
Route::post('/takaUpdate',[takaController::class,'takaUpdate']);
Route::post('/takaDelete',[takaController::class,'takaDelete']);
/*taka route work end form here*/

// admin profile update route code start form here
Route::post('adminProUpdate',[adminProfileController::class,'adminProUpdate'])->name('admin.proUpdate');
// admin profile update route code end form here

// non verify student Route start form here
Route::post('/adminNonVerifyStu',[nonVerifyController::class,'adminNonVerifyStu']);
// non verify student Route end form here

// due invoice Route work start form here
Route::post('/admin/dueInvoiveUpdate',[invoiceController::class,'dueInvoiveUpdate'])->name('admin.dueInvoiveUpdate');
// due invoice Route work end form here

// admin forget password route work start form here
Route::post('/admin/forgetPass',[adminForgetPassController::class,'adminPostForgetPass'])->name('admin.PostForgetPass');
Route::post('/admin/ressetPass/{adminResetCode}',[adminForgetPassController::class,'adminPostRessetPass'])->name('admin.PostRessetPass');
// admin forget password route work start form here

/*Admin group route work start form here*/
Route::middleware([studentAccess::class])->group(function () {
    Route::get('/getregister',[addController::class,'getregister']);
    Route::get('/getFive',[fiveController::class,'getFive']);
    Route::get('/getSix',[sixController::class,'getSix']);
    Route::get('/getSeven',[sevenController::class,'getSeven']);
    Route::get('/getEight',[eightController::class,'getEight']);
    Route::get('/getNine',[nineController::class,'getNine']);
    Route::get('/getTen',[tenController::class,'getTen']);
    Route::get('/getCollage',[collageController::class,'getCollage']);
    Route::get('/getHsc',[hscController::class,'getHsc']);
    Route::get('/getClass',[classController::class,'getClass']);
    Route::get('/showDepart',[departmentController::class,'showDepart'])->name('show.depart');
    Route::get('/showTaka',[takaController::class,'showTaka']);
//five Route Work end form here
    Route::prefix('admin')->group(function () {
        Route::get('/',[homeController::class,'home'])->name('admin.home')->middleware(adminMiddleware::class);
        Route::get('/addregister',[register::class,'addregister']);
        Route::get('/viewregister',[register::class,'viewregister']);
        Route::get('/five',[fiveController::class,'five']);
        Route::get('/six',[sixController::class,'six']);
        Route::get('/seven',[sevenController::class,'seven']);
        Route::get('/eight',[eightController::class,'eight']);
        Route::get('/nine',[nineController::class,'nine']);
        Route::get('/ten',[tenController::class,'ten']);
        Route::get('/ssc',[sscController::class,'ssc']);
        Route::get('/collage',[collageController::class, 'collage']);
        Route::get('/hsc',[hscController::class, 'hsc']);
        Route::get('addClass',[classController::class,'addClass']);
        Route::get('depertment',[departmentController::class,'depertment'])->name('depertment');
        Route::get('taka',[takaController::class,'taka'])->name('view.taka');
        Route::get('/login',[adminLoginController::class,'adminLogin'])->name('admin.Login');
        Route::post('/storeLogin',[adminLoginController::class,'adminStoreLogin'])->name('admin.store.login');
        Route::get('/logout',[adminLoginController::class,'adminLogout'])->name('admin.logout');
        Route::get('/invoice',[invoiceController::class,'invoice'])->name('invoice');
        Route::post('storInvoice',[invoiceController::class,'storInvoice'])->name('poststore.invoice');
        Route::get('/letestInvoice',[invoiceController::class,'letestInvoice']);
        Route::post('/invoiceUpdateShoe',[invoiceController::class,'invoiceUpdateShoe'])->name('invoice.update.show');
        Route::post('/invoiceUpdate',[invoiceController::class,'invoiceUpdate'])->name('invoice.update');
        Route::get('/totalAmountDue',[invoiceController::class,'totalAmountDue']);
        Route::get('/selectInvoiceMonth',[invoiceController::class,'selectInvoiceMonth'])->name('invoice.selectInvoiceMonth');
        Route::get('/viewInoiceData/{month}',[invoiceController::class,'viewInoiceData'])->name('invoice.viewInoiceData');
        Route::get('/dueInvoiceDataShow',[invoiceController::class,'dueInvoiceDataShow'])->name('admin.dueInvoiceDataShow');
        Route::get('/profile',[adminProfileController::class,'adminProfile'])->name('admin.profile');
        Route::get('/adminProUpShow',[adminProfileController::class,'adminProUpShow'])->name('admin.proUpShow');
        Route::get('/nonVerify',[nonVerifyController::class,'nonVerify'])->name('admin.nonVerify');
        Route::get('/getNonVerifyStu',[nonVerifyController::class,'getNonVerifyStu'])->name('admin.getNonVerifyStu');
        Route::get('/nonVerifyEmailShow',[nonVerifyController::class,'nonVerifyEmailShow']);
        Route::get('/forgetPassword',[adminForgetPassController::class,'getForgetPassword'])->name('admin.getForgetPassword');
        Route::get('/resetPassword/{adminResetCode}',[adminForgetPassController::class,'getResetPassword'])->name('admin.getResetPassword');
    }); 
});
/*Admin group route work end form here*/



// student forget password  system route code start form here
Route::post('/PostStudentForgetPass',[studentForgetController::class,'PostStudentForgetPass'])->name('student.postforgetPass');
Route::post('/studentPostResetPass/{stuResetCode}',[studentForgetController::class,'studentPostResetPass'])->name('student.PostResetPass');
// student forget password  system route code end form here

// Student group route work start form here
Route::prefix('student')->group(function(){
    Route::get('/resgister',[register::class,'studentResgister'])->middleware('studentAlreadyLogin');
    Route::get('/login',[studentLoginController::class,'studentLogin'])->name('student.login')->middleware('studentAlreadyLogin');
    Route::post('/studentloginStore',[studentLoginController::class,'studentloginStore'])->name('student.login.strore')->middleware('studentAlreadyLogin');
    Route::get('/emailverify/{token}',[mailVerifyController::class,'emailverify'])->name('email.verify');
    Route::get('/profile',[studentProfileController::class,'studentProfile'])->name('student.profile')->middleware('studentLogin');
    Route::get('/logout',[studentProfileController::class,'studentLogout'])->name('student.logout');
    Route::post('/filterData',[studentProfileController::class,'filterData'])->name('filter.search');
    Route::get('/stuProEditShow',[studentProfileController::class,'stuProEditShow']);
    Route::post('/stuProUpdate',[studentProfileController::class,'stuProUpdate']);
    Route::get('/forgerPassword',[studentForgetController::class,'getForgerPassword'])->name('student.forgerPassword');
    Route::get('/resetPassword/{stuResetCode}',[studentForgetController::class,'getresetPassword'])->name('student.resetPassword');
});
// Student group route work end form here

Route::get('/studentDelete',[addController::class,'studentDelete']);
Route::get('/test',[invoiceController::class,'test']);
