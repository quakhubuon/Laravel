<?php

use Faker\Guesser\Name;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;

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

// FE
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/test', [HomeController::class, 'test']);
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/detail/{id}', [HomeController::class, 'detail']);
    Route::get('/shop', [HomeController::class, 'shop']);
    Route::get('/shop', [HomeController::class, 'search']);
    Route::get('/shop/{id}', [HomeController::class, 'shop_category']);
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/cart', [HomeController::class, 'cart']);
    Route::get('/check_out', [HomeController::class, 'check_out']);
    Route::get('/cart/{id}', [CartController::class, 'AddCart']);
    Route::post('/update_cart', [CartController::class, 'UpdateCart']);
    Route::get('/delete_cart/{id}', [CartController::class, 'DeleteCart']);
    Route::get('/delete_all', [CartController::class, 'DeleteAll']);
    Route::post('/add_detail', [CartController::class, 'AddDetail']);
    Route::get('/shop_filter', [HomeController::class, 'filter']);
    Route::get('/shop_filterP', [HomeController::class, 'filterP']);
    Route::get('/user', [HomeController::class, 'login']);
    Route::post('/user/sign_in', [HomeController::class, 'sign_in']);
    Route::get('/user/log_out', [HomeController::class, 'log_out']);
    Route::get('/place_order', [CartController::class, 'PlaceOrder']);
    Route::get('/history_checkout', [CartController::class, 'history_checkout']);
    Route::get('/detail_checkout', [CartController::class, 'detail_checkout']);

// BE

    Route::get('admin_register', [AdminController::class, 'register']);
    Route::post('admin/register', [AdminController::class, 'admin_register']);
    Route::get('admin', [AdminController::class, 'login'])->name('login');
    Route::post('admin/sign_in', [AdminController::class, 'sign_in']);

Route::group(['prefix' => 'admin', 'middleware' => 'checkLogin'], function() {
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::get('log_out', [AdminController::class, 'log_out']);
    Route::get('add_category', [CategoryController::class, 'add_category']);
    Route::get('list_category', [CategoryController::class, 'list_category']);
    Route::get('category', [CategoryController::class, 'category']);
    Route::get('list_category', [CategoryController::class, 'get_category']);
    Route::get('list_category/{id}', [CategoryController::class, 'delete_category']);
    Route::get('edit_category/{id}', [CategoryController::class, 'edit_category']);
    Route::get('update_category', [CategoryController::class, 'update_category']);

    Route::get('add_product', [ProductController::class, 'add_product']);
    Route::post('product', [ProductController::class, 'product']);
    Route::get('list_product', [ProductController::class, 'get_product']);
    Route::get('list_product/{id}', [ProductController::class, 'delete_product']);
    Route::get('edit_product/{id}', [ProductController::class, 'edit_product']);
    Route::post('update_product', [ProductController::class, 'update_product']);
    Route::get('list_checkout', [CartController::class, 'admin_checkout']);
    Route::get('detail_checkout', [CartController::class, 'admin_detail_checkout']);
    Route::get('detail_checkout_update', [CartController::class, 'detail_checkout_update']);
    Route::get('search_check_out', [CartController::class, 'search_check_out']);
    Route::get('list_user', [UserController::class, 'index']);
    Route::get('add_user', [UserController::class, 'add_user']);
    Route::get('create', [UserController::class, 'create']);
    Route::get('index_permission', [PermissionController::class, 'index_permission']);
    Route::get('index_role', [PermissionController::class, 'index_role']);
    Route::get('create_permission', [PermissionController::class, 'create_permission']);
    Route::get('create_role', [PermissionController::class, 'create_role']);
    Route::get('list_role', [PermissionController::class, 'list_role']);
    Route::get('list_permission', [PermissionController::class, 'list_permission']);
    Route::get('phan_quyen', [PermissionController::class, 'phan_quyen']);
    Route::get('vai_tro', [PermissionController::class, 'vai_tro']);
    Route::post('add_permission', [PermissionController::class, 'add_permission']);
    Route::post('add_role', [PermissionController::class, 'add_role']);
});