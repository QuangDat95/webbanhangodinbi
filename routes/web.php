<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ListOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
Route::group(['prefix' => 'admin'],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('order',OrderController::class);
    Route::resource('listorder',ListOrderController::class);
    Route::get('login',LoginController::class,'getLogin');
    Route::post('login',LoginController::class,'postLogin');
    Route::get('logout',LoginController::class,'getLogout');
});
Route::view('/categoryCreate','backend.category.create')->name('categoryCreate');
Route::view('/orderCreate','backend.orders.create')->name('orderCreate');
