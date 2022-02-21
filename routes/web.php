<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
});
Route::view('/categoryCreate','backend.category.create')->name('categoryCreate');
Route::view('/productCreate','backend.product.create')->name('productCreate');