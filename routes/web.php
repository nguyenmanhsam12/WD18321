<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    echo 'trang chur';
});


Route::get('/test',function(){
    echo '123';
});

Route::get('/show-user',[UserController::class,'showUser']);

Route::get('/get-user/{id}/{name?}',[UserController::class,'getUser']);

Route::get('/update-user',[UserController::class,'updateUser']);



Route::get('/thong-tin-sv',[ProfileController::class,'thongTin']);




