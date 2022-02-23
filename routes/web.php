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
Route::group(['middleware' => 'admin'],function(){
    Route::resource('category',CategoryController::class)->middleware('auth');
    Route::resource('product',ProductController::class)->middleware('auth');
    Route::resource('order',OrderController::class)->middleware('auth');
    Route::resource('listorder',ListOrderController::class)->middleware('auth');
    Route::get('login',[LoginController::class,'getLogin'])->name('getLogin');
    Route::post('login',[LoginController::class,'postLogin'])->name('postLogin');
    Route::post('logout',[LogoutController::class,'getLogout'])->name('getLogout');
});
Route::view('/categoryCreate','backend.category.create')->name('categoryCreate');
Route::view('/orderCreate','backend.orders.create')->name('orderCreate');
