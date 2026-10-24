<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserVoucherController;
use App\Http\Controllers\AdminVoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // User Routes
    Route::get('/dashboard', [UserVoucherController::class, 'index'])->name('dashboard');
    Route::get('/vouchers/{voucher}', [UserVoucherController::class, 'show'])->name('vouchers.show');

    // Admin Routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/vouchers', [AdminVoucherController::class, 'index'])->name('admin.vouchers.index');
        Route::post('/vouchers', [AdminVoucherController::class, 'store'])->name('admin.vouchers.store');
    });
});