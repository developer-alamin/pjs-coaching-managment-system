<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\siteController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\register;
use App\Http\Controllers\fiveController;
use App\Http\Controllers\sixController;
use App\Http\Controllers\sevenController;
use App\Http\Controllers\eightController;
use App\Http\Controllers\nineController;
use App\Http\Controllers\tenController;
use App\Http\Controllers\sscController;
use App\Http\Controllers\collageController;
use App\Http\Controllers\hscController;
use App\Http\Controllers\addController;


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
    return view('login');
});


Route::post('/register',[addController::class,'register']);
Route::get('/getregister',[addController::class,'getregister']);


//five Route Work start form here
Route::get('/getFive',[fiveController::class,'getFive']);
Route::post('/fiveEditShow',[fiveController::class,'fiveEditShow']);
Route::post('/fiveUpdate',[fiveController::class,'fiveUpdate']);
Route::post('/fiveDelete',[fiveController::class,'fiveDelete']);
//five Route Work end form here

//six Route Work start form here
Route::get('/getSix',[sixController::class,'getSix']);
Route::post('/sixEditShow',[sixController::class,'sixEditShow']);
Route::post('/sixUpdate',[sixController::class,'sixUpdate']);
Route::post('/sixDelete',[sixController::class,'sixDelete']);
//six Route Work end form here

/*seven route work start form here*/
Route::get('/getSeven',[sevenController::class,'getSeven']);
Route::post('/sevenEditShow',[sevenController::class,'sevenEditShow']);
Route::post('/sevenUpdate',[sevenController::class,'sevenUpdate']);
Route::post('/sevenDelete',[sevenController::class,'sevenDelete']);
/*seven route work end form here*/

/*eight route work start form here*/
Route::get('/getEight',[eightController::class,'getEight']);
Route::post('/eightEditShow',[eightController::class,'eightEditShow']);
Route::post('/eightUpdate',[eightController::class,'eightUpdate']);
Route::post('/eightDelete',[eightController::class,'eightDelete']);
/*eight route work end form here*/

/*nine route work start form here*/
Route::get('/getNine',[nineController::class,'getNine']);
Route::post('/nineEditShow',[nineController::class,'nineEditShow']);
Route::post('/nineUpdate',[nineController::class,'nineUpdate']);
Route::post('/ninetDelete',[nineController::class,'ninetDelete']);
/*nine route work end form here*/

/*ten route work start form here*/
Route::get('/getTen',[tenController::class,'getTen']);
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
Route::get('/getCollage',[collageController::class,'getCollage']);
Route::post('/collageEditShow',[collageController::class,'collageEditShow']);
Route::post('/collageUpdate',[collageController::class,'collageUpdate']);
Route::post('/collageDelete',[collageController::class,'collageDelete']);
/*collage route work end form here*/

/*hsc route work start form here*/
Route::get('/getHsc',[hscController::class,'getHsc']);
Route::post('/hscEditShow',[hscController::class,'hscEditShow']);
Route::post('/hscUpdate',[hscController::class,'hscUpdate']);
Route::post('/hscDelete',[hscController::class,'hscDelete']);
/*hsc route work end form here*/






Route::prefix('admin')->group(function () {
    Route::get('/',[homeController::class,'home']);
    Route::get('/register',[register::class,'register']);

    Route::get('/five',[fiveController::class,'five']);
    Route::get('/six',[sixController::class,'six']);
    Route::get('/seven',[sevenController::class,'seven']);
    Route::get('/eight',[eightController::class,'eight']);
    Route::get('/nine',[nineController::class,'nine']);
    Route::get('/ten',[tenController::class,'ten']);
    Route::get('/ssc',[sscController::class,'ssc']);
    Route::get('/collage',[collageController::class, 'collage']);
    Route::get('/hsc',[hscController::class, 'hsc']);
});


Route::get('/studentDelete',[addController::class,'studentDelete']);