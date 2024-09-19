<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [UserController::class, 'welcome'])->name('welcome');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', Dashboard::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
