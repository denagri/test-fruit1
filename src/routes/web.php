<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\RegisterController;

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

Route::get('/products', [IndexController::class,'index']);
Route::get('/products/search',[IndexController::class,'search']);
Route::get('/products/detail/{id}', [DetailController::class,'show'])->name('products.show');
Route::put('/products/{id}/update',[DetailController::class,'update'])->name('products.update');
Route::get('/products/register', [RegisterController::class,'index'])->name('products.register');
Route::post('/products/register',[RegisterController::class,'store'])->name('products.store');
