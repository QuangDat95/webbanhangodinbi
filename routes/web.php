<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ListOrderController;
use App\Http\Controllers\Auth\LoginLogoutController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => 'CheckLogin'],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('listorder',ListOrderController::class);
    Route::view('/categoryCreate','dashboards.categories.create')->name('categoryCreate');
    Route::view('/customerCreate','backend.customers.create')->name('customerCreate');
});

Route::get('/dashboard/login',[LoginLogoutController::class,'getlogin'])->name('getlogin');
Route::post('/dashboard/login',[LoginLogoutController::class,'postlogin'])->name('postlogin');
Route::get('/dashboard/logout',[LoginLogoutController::class,'postlogout'])->name('postlogout');

Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('properties/{id}',[WebsiteController::class,'properties'])->name('properties');
Route::post('addcart',[WebsiteController::class,'addcart']);
Route::get('cart',[WebsiteController::class,'getcart'])->name('getcart');
Route::post('delete/listcart',[WebsiteController::class,'deletelistcart']);
Route::post('delete/cart',[WebsiteController::class,'deletecart']);
Route::get('checkout',[WebsiteController::class,'getcheckout'])->name('getcheckout');
Route::post('checkout',[WebsiteController::class,'checkout'])->name('checkout');
Route::get('ordersuccess',[WebsiteController::class,'ordersuccess'])->name('ordersuccess');
Route::get('returnHome',[WebsiteController::class,'returnHome'])->name('returnHome');
Route::post('update/listcart',[WebsiteController::class,'saveitemlistcart']);
Route::get('dell',[WebsiteController::class,'dell'])->name('dell');
Route::get('asus',[WebsiteController::class,'asus'])->name('asus');
Route::get('hp',[WebsiteController::class,'hp'])->name('hp');
Route::get('lenovo',[WebsiteController::class,'lenovo'])->name('lenovo');
Route::get('acer',[WebsiteController::class,'acer'])->name('acer');
Route::get('contact',[WebsiteController::class,'contact'])->name('contact');
Route::get('home',[WebsiteController::class,'home']);
Route::get('setting/account',[UserController::class,'index'])->name('settingaccount');
Route::post('setting/account/update/general',[UserController::class,'updateaccountgeneral']);