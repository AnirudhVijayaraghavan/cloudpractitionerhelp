<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EducationController;


// Route::middleware(['auth'])->group(function () {

// });

// Education Center Routes - EducationController - Handles all things Education-section related.
Route::get('/education-section', [EducationController::class, "showEducationSection"])->middleware('auth')->name('educationsection');


// Quizzes Center Routes - QuizzesController - Handles all things Quiz-section related.
Route::get('/quizzes-section/{id}/quiz/{quizID}', [QuizzesController::class, "viewSingleQuizDetails"])
    ->middleware('auth')
    ->name('quizdetailindividual');
Route::put('/quizzes-section/{id}/newquiz/{quizID}', [QuizzesController::class, "storeNewQuiz"])
    ->middleware('auth')
    ->name('quizsessionstore');
Route::get('/quizzes-section/{id}/newquiz', [QuizzesController::class, "startNewQuiz"])->middleware('auth')->name('quizsession');
Route::get('/quizzes-section/{id}', [QuizzesController::class, "showQuizzesSection"])->middleware('auth')->name('quizzessection');


// Settings Routes - SettingsController - Handles settings related routes.
Route::get('/settings', [SettingsController::class, "showSettings"])->middleware('auth')->name('settings');


// Profile Routes - ProfileController - Handles profile editing (change email, name, password and other features like premium)
Route::put('/profile/updatepass/{id}', [ProfileController::class, "updateProfilePass"])->middleware('auth')->name('profpass');
Route::put('/profile/update/{id}', [ProfileController::class, "updateProfileInfo"])->middleware('auth')->name('profinfo');
Route::get('/profile/{id}', [ProfileController::class, "showProfile"])->middleware('auth')->name('profile');


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
// basic policies / gates for authorization. - DONE
// profile page - make it close to laravel start kits. - DONE
// set up dashboard page - DONE
// quiz - make with livewire - PArtially DONE
// educational content - 
// premium - 