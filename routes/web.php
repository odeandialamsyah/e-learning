<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth', 'role:admin')->name('dashboard');


//register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/registerAdd', [RegisterController::class, 'register']);


//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginApp', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
