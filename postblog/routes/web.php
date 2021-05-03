<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () 
{
     return view('Home');
});

//  user signup 
Route::view('/signup','signup');

// user signin
Route::view('/signin','signin');

// insert form data
Route::post('/insert',[UserController::class,'insert']);

// login
Route::post('/login',[UserController::class,'login']);

// user dashboard 
Route::view('/dashboard','dashboard');

// view post form
Route::view('/add-post','addpost');

// Add post 
Route::post('/add-post',[AdminController::class,'addpost']);

// show post
Route::get('/show-post/{id}',[AdminController::class,'showpost']);

// Edit Post
Route::get('/editpost/{id}',[AdminController::class,'editpost']);

// Delete Post
Route::get('/deletepost/{id}',[AdminController::class,'deletepost']);

// logout
Route::get('/logout',[AdminController::class,'logout']);

// update post
Route::post('/updatepost',[AdminController::class,'updatepost']);


