<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');
Route::get('/product/{slug}', [MainController::class, 'productDetail'])->name('product.detail');
Route::get('/simulator', [MainController::class, 'simulator'])->name('simulator');
Route::get('/warranty', [MainController::class, 'warranty'])->name('warranty');

Route::post('/contact/store', [MainController::class, 'storeContact'])->name('contact.store');
Route::post('/warranty/store', [MainController::class, 'storeWarranty'])->name('warranty.store');
