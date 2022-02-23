<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ListOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::group(['middleware' => 'CheckLogin'],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('order',OrderController::class);
    Route::resource('listorder',ListOrderController::class);
    Route::view('/categoryCreate','backend.category.create')->name('categoryCreate');
    Route::view('/orderCreate','backend.orders.create')->name('orderCreate');
});
Route::get('/dashboard/login',[LoginController::class,'getLogin'])->name('getLogin');
Route::post('/dashboard/login',[LoginController::class,'postLogin'])->name('postLogin');
Route::get('/dashboard/logout',[LogoutController::class,'getLogout'])->name('getLogout');