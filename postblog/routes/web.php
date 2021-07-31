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
Route::get('/editpost/{id}', [HomeController::class, 'editpost'])->name('editpost');

// Update post
Route::post('/updatepost',[HomeController::class, 'updatepost'])->name('updatepost');

// Delete post
Route::get('/deletepost/{id}', [HomeController::class, 'deletepost'])->name('deletepost');

// Roles && permissions view
Route::get('/permission',[HomeController::class,'permission']);

// load data from ajax on show blade file
Route::get('xyz',[HomeController::class,'showdata'])->name('xyz');

// send Email
// Route::get('Sendemail',[HomeController::class,'sendEmail'])->name('sendemail');

// Event and listner
// Route::get('Event',[HomeController::class,'Event'])->name('event');

Route::get('product', [HomeController::class, 'product']);


