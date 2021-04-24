<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::resource('users', UserController::class);
Route::get('home', [DashboardController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('coupons', CouponController::class);

Route::resource('products', ProductController::class);
Route::get('inactive/product/{id}', [ProductController::class, 'inactive']);
Route::get('active/product/{id}', [ProductController::class, 'active']);
Route::resource('blogs', Blo::class);
