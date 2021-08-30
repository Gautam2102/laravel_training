<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbcController;

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
    return view('welcome');
});
// index page


// login page view
Route::get('/login',[AbcController::class,'index'])->name('login');

    
Route::post('/admin',[AbcController::class,'postadmin'])->name('postadmin');



Route::group(['middleware'=>'admin'],function(){

    Route::get('/home',[AbcController::class,'index'])->name('home');

// post data 
Route::post('/postdata',[AbcController::class,'create'])->name('postdata');

// Read data
Route::get('/show',[AbcController::class,'Read'])->name('users.index');

// postbill
Route::post('/postbill',[AbcController::class,'billGenrate'])->name('postbill');

// genrate bill and calculate bill and insert database
Route::get('/genratefillform/{id}',[AbcController::class,'genratefillform']);

// Delete Custumer
Route::get('/deletecustumer/{id}',[AbcController::class,'deletecustumer']);

// edit custumer form data
Route::get('/editcustumer/{id}',[AbcController::class,'editcustumer']);

// update custumer form data
Route::post('/updatedata',[AbcController::class,'updatecustumer'])->name('updatedata');

// fetch bill list
Route::get('/billlist',[AbcController::class,'billlist'])->name('users.billlist');

});






