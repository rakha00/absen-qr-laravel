<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Authentication Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Course Management Routes
    Route::resource('courses', CourseController::class);
    Route::resource('courses.course-sessions', CourseSessionController::class)->except(['index'])->parameters([
        'course-sessions' => 'session',
    ]);
    Route::get('courses/{course}/course-sessions', [CourseSessionController::class, 'index'])->name('courses.course-sessions.index');

    // Student Attendance History
    Route::get('/attendance/history', [AttendanceController::class, 'history'])->name('attendance.history');

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Attendance Routes (Protected)
Route::get('/attendance/{uuid}', [AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/{uuid}', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/success', [AttendanceController::class, 'success'])->name('attendance.success');

// Admin Routes (Protected by 'admin' role middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create-lecturer', [AdminController::class, 'createLecturer'])->name('admin.create-lecturer');
    Route::post('/admin/create-lecturer', [AdminController::class, 'storeLecturer'])->name('admin.store-lecturer');
});
