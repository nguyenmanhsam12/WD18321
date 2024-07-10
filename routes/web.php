<?php

use App\Http\Controllers\ProductController;
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




Route::prefix('/users')->group(function(){
   Route::get('/list-users',[UserController::class,'listUsers'])->name('users.listUsers');
   Route::get('/add-users',[UserController::class,'addUser'])->name('users.addUser');
   Route::post('/add-users',[UserController::class,'addPostUser'])->name('users.addPostUser');
   Route::get('/detele/{id}',[UserController::class,'deleteUser'])->name('users.deleteUser');
   Route::get('/edit/{id}',[UserController::class,'editUser'])->name('users.editUser');
   Route::post('/update/{id}',[UserController::class,'updateUser'])->name('users.updateUser');
});

Route::prefix('product')->group(function(){
    Route::get('/list-product',[ProductController::class,'listProduct'])->name('product.index');
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('product.addProduct');
    Route::post('/post-product',[ProductController::class,'postProduct'])->name('product.postProduct');
    Route::get('/delelte/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');
    Route::get('/edit/{id}',[ProductController::class,'editProduct'])->name('product.edit');
    Route::post('/update/{id}',[ProductController::class,'updateProduct'])->name('product.update');
    Route::post('/timkiem',[ProductController::class,'timkiem'])->name('product.timkiem');
    
});





