<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Booking\BookingController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('/auth')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'loginPage'])->name('auth.sign-in.page');
    Route::post('/sign-in', [AuthController::class, 'login'])->name('auth.sign-in');

    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.forgot-password.page');
    Route::post('/forgot-password', [AuthController::class, 'sendResetPasswordEmail'])->name('auth.send-reset-password-email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('auth.reset-password.page');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password');
});


Route::get('/', function () {
    return view('admin.pages.dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::prefix('/booking')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/', [BookingController::class, 'store'])->name('booking.store');
    Route::put('/', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
});
