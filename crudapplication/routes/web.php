<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CrudController;

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


// show form
Route::get('/',[CrudController::class,'index']);

// insert form data
Route::post('/insert',[CrudController::class,'insert']);

// show form data 
Route::get('/show',[CrudController::class,'show']);

// edit form data
Route::get('/edit/{id}',[CrudController::class,'edit']);

// update form data
Route::post('/update',[CrudController::class,'update']);

// delete form data
Route::get('/delete/{id}',[CrudController::class,'delete']);

// login
Route::get('/login',function(){

if(session()->has('id')){

return view('/home');

}
return view('/login');

});

// check username password
Route::post('/login',[CrudController::class,'login']);

// check middleware
Route::group(['middleware'=>['CustAuth']],function(){

    Route::view('home','home');
});

// logout
Route::get('/logout',[CrudController::class,'logout']);