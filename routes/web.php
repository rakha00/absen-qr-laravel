<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSessionController;
use App\Http\Controllers\DashboardController;
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
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/lecturer/dashboard', [DashboardController::class, 'lecturerDashboard'])->name('lecturer.dashboard');
    Route::get('/student/dashboard', [DashboardController::class, 'studentDashboard'])->name('student.dashboard');

    // Course Management Routes
    Route::resource('courses', CourseController::class);
    Route::resource('courses.course-sessions', CourseSessionController::class)->except(['index'])->parameters([
        'course-sessions' => 'session',
    ]);
    Route::get('courses/{course}/course-sessions', [CourseSessionController::class, 'index'])->name('courses.course-sessions.index');
});

// Attendance Routes (Public)
Route::get('/attendance/{uuid}', [AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/{uuid}', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/success', [AttendanceController::class, 'success'])->name('attendance.success');
