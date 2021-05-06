<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

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
     return view('welcome');
   
});

Auth::routes();
// home 
Route::get('/home', [HomeController::class, 'index'])->name('home');
// show post
Route::get('/show', [HomeController::class, 'show'])->name('show');

// addpost according to get
Route::get('/addpost', [HomeController::class, 'addpost'])->name('addpost');

// insert post
Route::post('/addpost', [HomeController::class, 'insertpost'])->name('insertpost');

// insert post
Route::get('/editpost/{id}', [HomeController::class, 'editpost']);

// Delete post
Route::get('/deletepost/{id}', [HomeController::class, 'deletepost']);
