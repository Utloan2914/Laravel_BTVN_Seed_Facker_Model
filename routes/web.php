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
Route::get('/detail/{id}', [PageController::class, 'getDetail'])->name('detail');
Route::post('/comment/{id}', [PageController::class, 'postComment'])->name('post.comment');
//Admin
Route::get('/admin', [PageController::class, 'getIndexAdmin'])->name('admin.index');

Route::get('/admin-add-form', [PageController::class, 'getAdminAdd'])->name('add-product');
Route::post('/admin-add-form', [PageController::class, 'postAdminAdd']);

Route::get('/admin-edit-form/{id}', [PageController::class, 'getAdminEdit'])->name('admin-edit');
Route::post('/admin-edit-form/{id}', [PageController::class, 'postAdminEdit']);
Route::delete('/admin-delete/{id}', [PageController::class, 'postAdminDelete'])->name('admin-delete');

Route::get('/admin-export', [PageController::class, 'exportAdminProduct'])->name('export');

Route::get('/return-vnpay', function () {
    return view('vnpay.return-vnpay');
});
