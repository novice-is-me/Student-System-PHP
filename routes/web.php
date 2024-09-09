<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'welcome']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/dashboard', [UserController::class, 'index']);
Route::get('/enrollment', [UserController::class, 'enrollment']);
// Route for students for options (enrollment, adding, removing subjects)
Route::post('/add-subject', [UserController::class, 'addSubject']);
Route::post('/enroll-course', [UserController::class, 'enrollCourse']);
Route::delete('/remove-subject', [UserController::class, 'removeSubject']);
Route::get('/logout', [UserController::class, 'logout']);

// Admin Routes
// Route for displaying admin dashboard
Route::get('/dashboard/admin', [AdminController::class, 'index']);
// Route for adding subjects
Route::post('/dashboard/admin', [AdminController::class, 'createSubject']);
// Route for adding courses

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
