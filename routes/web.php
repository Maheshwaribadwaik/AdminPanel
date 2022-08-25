<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

Route::view('/master', 'layout.master');
Route::view('/sidebar', 'layout.sidebar');
// Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::view('/products/create', 'products.create');

// product
Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
Route::get('/products/index', [ProductController::class,'index'])->name('products.index');
Route::get('/products/edit/{id}', [ProductController::class,'edit'])->name('products.edit');
Route::post('/update/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/delete/{id}',[ProductController::class,'delete'])->name('products.delete');
Route::get('/detail/{id}',[ProductController::class,'detail'])->name('products.detail');


// order

Route::get('/orders/index',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/confirm/{id}',[OrderController::class,'confirm'])->name('orders.confirm');
Route::get('/orders/pending/{id}',[OrderController::class,'pending'])->name('orders.pending');
Route::get('/orders/details/{id}',[OrderController::class,'show'])->name('orders.details');


// user
Route::get('/users/index', [UserController::class,'index'])->name('user.index');
Route::get('/users/details/{id}', [UserController::class,'show'])->name('users.details');
Route::get('/admin/profile', [UserController::class,'profile'])->name('admin.profile');
Route::post('/admin/profile/store', [UserController::class,'profile_store'])->name('admin.profile.store');


});
// Route::get('/', [FrontController::class,'index'])->name('front.index');


Route::get('/', [FrontController::class,'index'])->name('front.index');
Route::get('/user/register', [FrontController::class,'register'])->name('user.register');
Route::post('/user/register/store', [FrontController::class,'store'])->name('register.store');


Route::get('/user/login', [LoginController::class,'login'])->name('user.login');
Route::post('/user/login/store', [LoginController::class,'store'])->name('login.store');
Route::get('/user/logout', [LoginController::class,'logout'])->name('user.logout');


// userprofile
Route::get('/profile', [UserProfileController::class,'profile'])->name('profile.index');
Route::get('/user/details/{id}', [UserProfileController::class,'show'])->name('front.profile.details');
Route::get('/user/profile/edit/{id}', [UserProfileController::class,'edit'])->name('profile.edit');
Route::post('/user/profile/update/{id}', [UserProfileController::class,'update'])->name('profile.update');



// cart
Route::get('/front/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/front/cart/store', [CartController::class,'cart_store'])->name('cart.store');
