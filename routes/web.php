<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProductController;


Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/profile', function () {
    return view('profile.show');
})->middleware(['auth'])->name('profile.show');


// Product pages
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');




Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Cart
Route::get('/cart', [ProductController::class, 'cart'])->name('cart.view');
Route::get('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');


// ====================
// Admin Routes
// ====================

Route::prefix('admin')->group(function () {
    // Authentication
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login.show');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.perform');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Dashboard (protected)
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])
    ->name('admin.dashboard');


    // Product Management
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/update/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/delete/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.delete');
});
