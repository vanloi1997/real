<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
//frontend
Route::get('', [HomeController::class, 'index']);

//danh muc san pham frontend
Route::get('/danh-muc-san-pham/{id}', [CategoryProductController::class, 'show_category_home']);

//thuong hieu san pham
Route::get('/thuong-hieu-san-pham/{id}', [BrandController::class, 'show_brand_home']);

//chi tiet san pham
Route::get('/chi-tiet-san-pham/{id}', [ProductController::class, 'details_product']);

//backend
Route::get('/login', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'login']);

//category product
Route::get('/add-category', [CategoryProductController::class, 'add_category']);
Route::post('/save-category', [CategoryProductController::class, 'save_category']);
Route::get('/edit-category/{id}', [CategoryProductController::class, 'edit_category']);
Route::post('/update-category/{id}', [CategoryProductController::class, 'update_category']);
Route::get('/delete-category/{id}', [CategoryProductController::class, 'delete_category']);
Route::get('/all-category', [CategoryProductController::class, 'all_category']);
Route::get('/unactive-category/{id}', [CategoryProductController::class, 'unactive_category']);
Route::get('/active-category/{id}', [CategoryProductController::class, 'active_category']);


//brand product
Route::get('/add-brand', [BrandController::class, 'add_brand']);
Route::post('/save-brand', [BrandController::class, 'save_brand']);
Route::get('/edit-brand/{id}', [BrandController::class, 'edit_brand']);
Route::post('/update-brand/{id}', [BrandController::class, 'update_brand']);
Route::get('/delete-brand/{id}', [BrandController::class, 'delete_brand']);
Route::get('/all-brand', [BrandController::class, 'all_brand']);
Route::get('/unactive-brand/{id}', [BrandController::class, 'unactive_brand']);
Route::get('/active-brand/{id}', [BrandController::class, 'active_brand']);


//product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::get('/edit-product/{id}', [ProductController::class, 'edit_product']);
Route::post('/update-product/{id}', [ProductController::class, 'update_product']);
Route::get('/delete-product/{id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{id}', [ProductController::class, 'active_product']);

//cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
