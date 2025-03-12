<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;

Route::get('/product', [PageController::class, 'getIndex']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lienhe', [PageController::class, 'getContact'])->name('lienhe');
Route::get('/about', [PageController::class, 'getAbout'])->name('about');
Route::get('/themgiohang/{id}', [CartController::class, 'addToCart'])->name('themgiohang');
Route::get('/loai-san-pham/{id}', [PageController::class, 'getLoaiSp'])->name('loaisanpham');
Route::get('/trang-chu', [PageController::class, 'getIndex'])->name('trang-chu');
Route::get('/type/{id}', [PageController::class, 'getLoaiSp'])->name('loaisanpham');
