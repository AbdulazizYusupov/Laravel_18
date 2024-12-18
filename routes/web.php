<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',[ProductController::class,'index'])->name('index');
Route::post('/product-store',[ProductController::class,'store'])->name('store');
