<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductOptionController;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

  Route::get('dashboard   ', [AdminDashboardController::class, 'index'])->name('dashboard');

  /** Profile Routes */
  Route::get('profile', [ProfileController::class, 'index'])->name('profile');
  Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
  Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');


  /** Product Category Routes */
  Route::resource('category', CategoryController::class);

  /** Product Routes */
  Route::resource('product', ProductController::class);

  /** Product Gallery Routes */
  Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
  Route::resource('product-gallery', ProductGalleryController::class);


  /** Product Size Routes */
  Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
  Route::resource('product-size', ProductSizeController::class);

  /** Product Size Routes */
  Route::resource('product-option', ProductOptionController::class);
});
