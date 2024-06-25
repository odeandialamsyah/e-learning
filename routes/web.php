<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\QuizController;



Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin specific routes
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

    Route::get('/courses/{course}/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/courses/{course}/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/courses/{course}/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/courses/{course}/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/courses/{course}/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
    

    Route::get('/modules/{module}/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
    Route::post('/modules/{module}/quizzes', [QuizController::class, 'store'])->name('quizzes.store');

    // Routes accessible by all authenticated users
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
    Route::get('/modules/{module}/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
});
