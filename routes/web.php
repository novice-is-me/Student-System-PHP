<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'welcome']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/dashboard', [UserController::class, 'index']);
// Route for students adding subjects
Route::post('/dashboard', [UserController::class, 'addSubject']);
// Route for students removing subjects
Route::post('/dashboard', [UserController::class, 'enrollCourse']);
Route::delete('/dashboard', [UserController::class, 'removeSubject']);
Route::get('/logout', [UserController::class, 'logout']);

// Admin Routes
// Route for displaying admin dashboard
Route::get('/dashboard/admin', [AdminController::class, 'index']);
// Route for adding subjects
Route::post('/dashboard/admin', [AdminController::class, 'createSubject']);
// Route for adding courses

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
