<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');

Route::get('/display_product', [ProductController::class, 'display_product'])->name('display_product');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/display_cart', [CartController::class, 'display_cart'])->name('cart.display_cart');
    Route::get('/display_summary', [SummaryController::class, 'display_summary'])->name('summary.display_summary');
});

require __DIR__.'/auth.php';
