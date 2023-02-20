<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuteurController; 
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\dateController; 

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



Route::post('/register',[TuteurController::class,'register']); 

Route::post('/login',[TuteurController::class,'login']);

Route::get('/logout', [TuteurController::class, 'logout'])->name('logout.user');


Route::get('/login',[TuteurController::class,'login'])->name('login'); // To Verify from Middle Ware

Route::middleware('auth:api')->get('/details',[TuteurController::class,'getTaskList'] );



Route::post('/registerclient',[ClientController::class,'registerclient']); 

Route::post('/loginclient',[ClientController::class,'loginclient']);

Route::get('/logoutclient', [ClientController::class, 'logoutclient'])->name('logoutclient.user');


Route::get('/loginclient',[ClientController::class,'loginclient'])->name('loginclient'); // To Verify from Middle Ware

Route::middleware('auth:api')->get('/details',[ClientController::class,'getTaskListclient'] );

Route::resource('date',dateController::class);
