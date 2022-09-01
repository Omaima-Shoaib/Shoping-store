<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoritesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','isAdmin','verified'])->name('dashboard');

require __DIR__.'/auth.php';

// Auth::routes();
Route::get('/home', [App\Http\Controllers\ProductController::class, 'userindex'])->name('home')->middleware(['verified','auth']);


//admin routes
Route::get('admin/users',[UserController::class,'index'])->name('users.index')->middleware('auth')->middleware(['auth','isAdmin','verifed']);
Route::get('admin/findusers',[UserController::class,'findusers'])->name('findusers.index')->middleware('auth')->middleware(['auth','isAdmin','verified']);
Route::delete('admin/user/{id}',[UserController::class,'delete'])->where('id','[0-9]+') ->name('user.delete')->middleware(['auth','isAdmin']);
Route::get('admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products')->middleware(['auth','isAdmin','verified']);
Route::get('admin/products/create' ,[ProductController::class,'create'])->name('products.create')->middleware(['auth','isAdmin','verified']);
Route::post('admin/products',[ProductController::class,'store'])->name('products.store')->middleware(['auth','isAdmin','verified']);
Route::delete('admin/products/{id}',[ProductController::class,'delete'])->where('id','[0-9]+') ->name('products.delete')->middleware(['auth','isAdmin','verified']);
Route::get('admin/products/{id}/edit',[ProductController::class,'edit'])->where('id','[0-9]+')->name('products.edit')->middleware(['auth','isAdmin','verified']);
Route::put('admin/products/{id}',[ProductController::class,'update'])->name('products.update')->middleware(['auth','isAdmin','verified']);
Route::get('admin/{id}',[UserController::class,'show'])->name('users.show')->middleware(['auth','isAdmin','verified']);


//user routesg
Route::get('product/',[ProductController::class,'filterByCategory'])->name('products.filterByCategory');
Route::get('productGetById/{id}',[ProductController::class,'get'])->name('products.get')->middleware(['auth']);
Route::get('favorite/{userId}/{productId}',[FavoritesController::class,'create'])->name('favorites.create')->middleware(['auth']);
Route::get('favorite/{userId}',[FavoritesController::class,'get'])->name('favorites.get')->middleware(['auth']);
Route::post('cart',[CartController::class,'store'])->name('cart.store')->middleware('auth');
Route::get('cart',[CartController::class,'index'])->name('cart.index')->middleware(['auth']);
Route::delete('cart/{id}',[CartController::class,'delete'])->where('id','[0-9]+') ->name('cart.delete')->middleware(['auth']);
Route::post('order',[OrderController::class,'store'])->name('order.store')->middleware('auth');
Route::get('order',[OrderController::class,'index'])->name('order.index')->middleware(['auth']);
