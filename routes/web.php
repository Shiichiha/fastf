<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;

Route::resource('products', ProductController::class);
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{code}', [OrderController::class, 'receipt'])->name('order.receipt');

Route::prefix('admin-xyz123')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/validate/{order}', [AdminController::class, 'validateOrder'])->name('admin.validate');
});