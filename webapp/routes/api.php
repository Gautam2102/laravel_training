<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//All secure URL's
Route::group(['middleware' => 'auth:sanctum'], function () {
    //  show admin panel inside data
    Route::get('/read', [ApiController::class, 'read']);
    //  Update Admin Data
    Route::post('/update/{id}', [ApiController::class, 'adminUpdate']);
    //  Delete Admin Data
    Route::get('/delete/{id}', [ApiController::class, 'adminDelete']);
});

// Login Admin
Route::post('login', [ApiController::class, 'loginAuthenticated']);
// Register Admin
Route::post('/register', [ApiController::class, 'adminRegister']);
