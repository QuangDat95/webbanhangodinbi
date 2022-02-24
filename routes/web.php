<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ListOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\WebsiteController;

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

Route::get('home',[WebsiteController::class,'index'])->name('home');
Route::get('properties/{id}',[WebsiteController::class,'properties'])->name('properties');
Route::get('addCart/{id}',[WebsiteController::class,'addCart'])->name('addCart');
Route::get('getCart',[WebsiteController::class,'getCart'])->name('getCart');
Route::get('deleteListCart/{id}',[WebsiteController::class,'deleteListCart']);
Route::get('checkout',[WebsiteController::class,'getCheckout'])->name('getCheckout');
Route::post('saveOrder',[WebsiteController::class,'Checkout'])->name('saveOrder');
Route::get('orderSuccess',[WebsiteController::class,'orderSuccess'])->name('orderSuccess');
Route::get('returnHome',[WebsiteController::class,'returnHome'])->name('returnHome');
Route::get('saveItemListCart/{id}/{amount}',[WebsiteController::class,'saveItemListCart']);