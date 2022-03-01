<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ListOrderController;
use App\Http\Controllers\Auth\LoginLogoutController;
use App\Http\Controllers\WebsiteController;

Route::group(['middleware' => 'CheckLogin'],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('order',OrderController::class);
    Route::resource('listorder',ListOrderController::class);
    Route::view('/categoryCreate','dashboards.categories.create')->name('categoryCreate');
    Route::view('/orderCreate','backend.orders.create')->name('orderCreate');
});


Route::get('/dashboard/login',[LoginLogoutController::class,'getlogin'])->name('getlogin');
Route::post('/dashboard/login',[LoginLogoutController::class,'postlogin'])->name('postlogin');
Route::get('/dashboard/logout',[LoginLogoutController::class,'postlogout'])->name('postlogout');

Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('properties/{id}',[WebsiteController::class,'properties'])->name('properties');
Route::post('addcart/{id}',[WebsiteController::class,'addcart']);
Route::get('getcart',[WebsiteController::class,'getcart'])->name('getcart');
Route::post('deletelistcart/{id}',[WebsiteController::class,'deletelistcart']);
Route::post('deletecart/{id}',[WebsiteController::class,'deletecart']);
Route::get('getcheckout',[WebsiteController::class,'getcheckout'])->name('getcheckout');
Route::post('checkout',[WebsiteController::class,'checkout'])->name('checkout');
Route::get('ordersuccess',[WebsiteController::class,'ordersuccess'])->name('ordersuccess');
Route::get('returnHome',[WebsiteController::class,'returnHome'])->name('returnHome');
Route::post('saveitemlistcart',[WebsiteController::class,'saveitemlistcart']);
Route::get('dell',[WebsiteController::class,'dell'])->name('dell');
Route::get('asus',[WebsiteController::class,'asus'])->name('asus');
Route::get('hp',[WebsiteController::class,'hp'])->name('hp');
Route::get('lenovo',[WebsiteController::class,'lenovo'])->name('lenovo');
Route::get('acer',[WebsiteController::class,'acer'])->name('acer');
Route::get('contact',[WebsiteController::class,'contact'])->name('contact');