<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;

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
//trang-chu
Route::get('', [HomeController::class, 'getIndex']);
//sản phẩm
Route::get('/product', [ProductController::class, 'getListProduct']);

/*backend --> /admin-page/ */
Route::get('admin-page/login', [AccountController::class, 'getLoginAdmin']);
Route::post('admin-page/login', [AccountController::class, 'postLoginAdmin']);
Route::get('admin-page/logout',[AccountController::class, 'getLogoutAdmin']);
// ADMIN
Route::group(['prefix' => 'admin-page', 'middleware' => 'CheckLoginAdmin'], function(){
    Route::get('', [HomeController::class, 'getAdminPage']);

    //danh mục
    Route::group(['prefix' => 'category'], function(){
        Route::get('list', [CategoryProductController::class, 'getList']);
        Route::get('add',[CategoryProductController::class, 'getAdd']);
        Route::post('add',[CategoryProductController::class, 'postAdd']);
        Route::get('edit/{id}',[CategoryProductController::class, 'getEdit']);
        Route::post('edit/{id}',[CategoryProductController::class, 'postEdit']);
        Route::get('delete/{id}',[CategoryProductController::class, 'getDelete']);
    });
    Route::group(['prefix' => 'brand'], function(){
        Route::get('list', [BrandController::class, 'getList']);
        Route::get('add',[BrandController::class, 'getAdd']);
        Route::post('add',[BrandController::class, 'postAdd']);
        Route::get('edit/{id}',[BrandController::class, 'getEdit']);
        Route::post('edit/{id}',[BrandController::class, 'postEdit']);
        Route::get('delete/{id}',[BrandController::class, 'getDelete']);
    });
    Route::group(['prefix' => 'product'], function(){
        Route::get('list', [ProductController::class, 'getList']);
        Route::get('add',[ProductController::class, 'getAdd']);
        Route::post('add',[ProductController::class, 'postAdd']);
        Route::get('edit/{id}',[ProductController::class, 'getEdit']);
        Route::post('edit/{id}',[ProductController::class, 'postEdit']);
        Route::get('delete/{id}',[ProductController::class, 'getDelete']);
    });


});
