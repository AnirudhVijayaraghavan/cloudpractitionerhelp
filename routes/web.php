<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Profile Routes - ProfileController - Handles profile editing (change email, name, password and other features like premium)
Route::get('/profile', [ProfileController::class, "showProfile"])->middleware('auth')->name('profile');

// Basic Routes - UserController - Handles Authentication, Registry, Landing page.
Route::post('/logout', [UserController::class, "logout"])->middleware('auth')->name('logout');
Route::get('/dashboard', [UserController::class, "showDashboard"])->middleware('auth')->name('dashboard');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::get('/register', [UserController::class, "showRegister"])->middleware('guest')->name('register');
Route::get('/login', [UserController::class, "showLogin"])->middleware('guest')->name('login');
Route::get('/', function () {
    return view('welcome');
});

// To add:
// basic routes page - login, register, authentication - DONE
// basic policies / gates for authorization.
// profile page - make it close to laravel start kits.
// set up dashboard page - 
// quiz - make with livewire
// educational content - 
// premium - 