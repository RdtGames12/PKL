<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Middleware for authentication
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Define routes for each menu item
    Route::get('/kios', [HomeController::class, 'showKiosk'])->name('Kios');
    Route::get('/tiketux', [HomeController::class, 'showTiketux'])->name('Tiketux');
    Route::get('/wl', [HomeController::class, 'showWhiteLabel'])->name('Wl');
});

// Guest middleware
Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

