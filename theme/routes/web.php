<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
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
Route::group(['middleware' => 'auth'], function () {

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/main', [HomeController::class, 'main'])->name('main');
Route::get('/ourvalues', [HomeController::class, 'showvalues'])->name('showvalues');
Route::post('/aboutmain',[HomeController::class,'aboutmain'])->name('aboutmain');
Route::post('/ourvalues',[HomeController::class,'ourvalues'])->name('ourvalues');
Route::get('/features',[HomeController::class,'featuresshow'])->name('featuresshow');
Route::post('/features',[HomeController::class,'features'])->name('features');
Route::get('/showservice',[HomeController::class,'showservices'])->name('showservices');
Route::post('/service',[HomeController::class,'services'])->name('service');
Route::get('aboutmainajax',[HomeController::class,'aboutmainshow'])->name('aboutmainajax');
Route::get('/show', [HomeController::class, 'show'])->name('show');
Route::get('/valueshow', [HomeController::class, 'valueshow'])->name('valueshow');
Route::get('/valueshowajax', [HomeController::class, 'valueshowajax'])->name('valueshowajax');
Route::get('/show', [HomeController::class, 'show'])->name('show');
Route::get('/showfeaturesajax', [HomeController::class, 'showfeaturesajax'])->name('showfeaturesajax');
Route::get('/showfeatures', [HomeController::class, 'showfet'])->name('showfeatures');
Route::get('/price', [HomeController::class, 'price'])->name('price');
Route::post('/postprice', [HomeController::class, 'postprice'])->name('postprice');
Route::get('/priceajax', [HomeController::class, 'priceajax'])->name('priceajax');
Route::get('/showprice', [HomeController::class, 'showprice'])->name('showprice');
Route::get('/showserivcesection', [HomeController::class, 'showserivcesection'])->name('showserivcesection');
Route::get('/showserivceajax', [HomeController::class, 'showserivceajax'])->name('showserivceajax');
Route::get('/editmain/{id}',[HomeController::class,'editmain'])->name('editmain');
Route::post('/updatemain',[HomeController::class,'updatemain'])->name('updatemain');
Route::post('/updateourvalues',[HomeController::class,'updateourvalues'])->name('updateourvalues');
Route::get('/editourvalue/{id}',[HomeController::class,'editourvalue'])->name('editourvalue');
Route::post('/updatefeatures',[HomeController::class,'updatefeatures'])->name('updatefeatures');
Route::get('/editfeature/{id}',[HomeController::class,'editfeature'])->name('editfeature');
Route::post('/updateservice',[HomeController::class,'updateservice'])->name('updateservice');
Route::get('/editservice/{id}',[HomeController::class,'editservice'])->name('editservice');
Route::post('/updateprice',[HomeController::class,'updateprice'])->name('updateprice');
Route::get('/editprice/{id}',[HomeController::class,'editprice'])->name('editprice');
Route::get('/deletemain/{id}',[HomeController::class,'deletemain'])->name('deletemain');
Route::get('/deleteourvalue/{id}',[HomeController::class,'deleteourvalue'])->name('deleteourvalue');
Route::get('/deletefeature/{id}',[HomeController::class,'deletefeature'])->name('deletefeature');
Route::get('/deleteservice/{id}',[HomeController::class,'deleteservice'])->name('deleteservice');
Route::get('/deleteprice/{id}',[HomeController::class,'deleteprice'])->name('deleteprice');
Route::get('/team',[HomeController::class,'team'])->name('team');
Route::get('/showteam',[HomeController::class,'showteam'])->name('showteam');
Route::post('/postteam',[HomeController::class,'postteam'])->name('postteam');
Route::get('/editteam/{id}',[HomeController::class,'editteam'])->name('editteam');
Route::post('/updateteam',[HomeController::class,'updateteam'])->name('updateteam');
Route::get('/deleteteam/{id}',[HomeController::class,'deleteteam'])->name('deleteteam');
Route::get('/showteamajax',[HomeController::class,'showteamajax'])->name('showteamajax');
Route::get('/client',[HomeController::class,'client'])->name('client');
Route::post('/updateclient',[HomeController::class,'updateclient'])->name('updateclient');
Route::get('/editclient/{id}',[HomeController::class,'editclient'])->name('editclient');
Route::get('/deleteclient/{id}',[HomeController::class,'deleteclient'])->name('deleteclient');
Route::get('/showclientajax',[HomeController::class,'showclientajax'])->name('showclientajax');
Route::get('/showclient',[HomeController::class,'showclient'])->name('showclient');
Route::post('/postclient',[HomeController::class,'postclient'])->name('postclient');
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::post('/updateblog',[HomeController::class,'updateblog'])->name('updateblog');
Route::get('/editblog/{id}',[HomeController::class,'editblog'])->name('editblog');
Route::get('/deleteblog/{id}',[HomeController::class,'deleteblog'])->name('deleteblog');
Route::get('/showblogtajax',[HomeController::class,'showblogajax'])->name('showblogajax');
Route::get('/showblog',[HomeController::class,'showblog'])->name('showblog');
Route::post('/postblog',[HomeController::class,'postblog'])->name('postblog');
Route::get('/portfolio',[HomeController::class,'portfolio'])->name('portfolio');
Route::post('/updateportfolio',[HomeController::class,'updateportfolio'])->name('updateportfolio');
Route::get('/editportfolio/{id}',[HomeController::class,'editportfolio'])->name('editportfolio');
Route::get('/deleteportfolio/{id}',[HomeController::class,'deleteportfolio'])->name('deleteportfolio');
Route::get('/showportfoliotajax',[HomeController::class,'showportfolioajax'])->name('showportfolioajax');
Route::get('/showportfolio',[HomeController::class,'showportfolio'])->name('showportfolio');
Route::post('/postportfolio',[HomeController::class,'postportfolio'])->name('postportfolio');
Route::post('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/admin',[HomeController::class,'admin'])->name('admin');
Route::get('/showcontact',[HomeController::class,'showcontact'])->name('showcontact');
Route::post('/permission',[HomeController::class,'permission']);
Route::get('/showcontactajax',[HomeController::class,'showcontactajax'])->name('showcontactajax');
Route::get('/addquestion',[HomeController::class,'addquestion'])->name('addquestion');
Route::get('/showquestion',[HomeController::class,'showquestion'])->name('showquestion');
Route::post('/postque',[HomeController::class,'postque'])->name('postque');
Route::get('/quedit/{id}',[HomeController::class,'quedit'])->name('quedit');
Route::get('/delete/{id}',[HomeController::class,'quedelete'])->name('quedelete');
Route::post('/updateque',[HomeController::class,'updateque'])->name('updateque');
Route::get('/option/delete/{id}',[HomeController::class,'destroy']);
Route::post('/postxyz',[HomeController::class,'postxyz'])->name('postxyz');
Route::get('/xyz',[HomeController::class,'xyz']);


    });

Route::get('/', [IndexController::class, 'main'])->name('/');

Auth::routes();

