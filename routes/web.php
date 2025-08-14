<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Authentication Routes
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\LecturerDashboardController::class, 'index'])->name('dashboard');

    // Course Management Routes
    Route::resource('courses', App\Http\Controllers\CourseController::class);
});
