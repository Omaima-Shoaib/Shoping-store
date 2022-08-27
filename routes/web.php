<?php

use App\Http\Controllers\ProductController;
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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin routes
Route::get('admin/products', [App\Http\Controllers\AdminController::class, 'index'])->name('products')->middleware(['auth','isAdmin']);
Route ::get('products/create' ,[ProductController::class,'create'])->name('products.create')->middleware(['auth','isAdmin']);



// Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

// });