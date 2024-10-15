<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Livewire\AddCourse;
use App\Livewire\Admin;
use App\Livewire\Dashboard;
use App\Livewire\EditCourse;
use App\Livewire\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [UserController::class, 'welcome'])->name('welcome');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/admin', Admin::class)->name('admin');
// Admin section

Route::get('edit-course/{id}', EditCourse::class)->name('edit-course');
Route::get('add-course', AddCourse::class)->name('add-course');
// Enrollment Section
Route::get('/enrollment', Enrollment::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
