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


Route::get('sen',[CrudController::class,'sendsms']);

Route::get('/',[CrudController::class,'index']);
Route::post('/insert',[CrudController::class,'insert']);
Route::get('/show',[CrudController::class,'show']);
Route::get('/edit/{id}',[CrudController::class,'edit']);
Route::post('/update',[CrudController::class,'update']);
Route::get('/delete/{id}',[CrudController::class,'delete']);

Route::get('/login',function(){

if(session()->has('id')){

return view('/home');

}
return view('/login');

});

Route::post('/login',[CrudController::class,'login']);

Route::group(['middleware'=>['CustAuth']],function(){

    Route::view('home','home');
});
Route::get('/logout',[CrudController::class,'logout']);