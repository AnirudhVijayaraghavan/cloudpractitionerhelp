<?php

use App\Http\Controllers\MiscController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EducationController;


// Route::middleware(['auth'])->group(function () {

// });
// Misc Routes - Privacy, Terms of Service.
Route::get('/privacy', [MiscController::class, "privacy"])->name('privacy');
Route::get('/terms', [MiscController::class, "tos"])->name('tos');
Route::fallback(function () {
    return response()->view('errors.404');
});

// Admin related routes - AdminController - Handles everything admin related / CMS
Route::middleware(['auth', 'can:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        // Handling Users            
        Route::get('/users', [AdminController::class, 'showUsers'])
            ->name('users.index');
        Route::get('/users/create', [AdminController::class, 'showUsersCreate'])
            ->name('users.create');
        Route::post('/users/store', [AdminController::class, 'storeUser'])
            ->name('users.store');
        Route::get('/users/{user}', [AdminController::class, 'showUsersEdit'])
            ->name('users.edit');
        Route::put('/users/{user}', [AdminController::class, 'updateUser'])
            ->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])
            ->name('users.destroy');

        // Handling Questions
        Route::get('/questions', [AdminController::class, 'showQuestions'])
            ->name('questions.index');
        Route::get('/questions/create', [AdminController::class, 'showQuestionsCreate'])
            ->name('questions.create');
        Route::post('/questions/store', [AdminController::class, 'storeQuestion'])
            ->name('questions.store');
        Route::get('/questions/{question}', [AdminController::class, 'showQuestionsEdit'])
            ->name('questions.edit');
        Route::put('/questions/{question}', [AdminController::class, 'updateQuestion'])
            ->name('questions.update');
        Route::delete('/questions/{question}', [AdminController::class, 'destroyQuestion'])
            ->name('questions.destroy');

        // Handling Quizzes
        Route::get('/quizzes', [AdminController::class, 'showQuizzes'])
            ->name('quizzes.index');
        Route::get('/quizzes/{quiz}', [AdminController::class, 'showQuiz'])
            ->name('quizzes.show');
        Route::delete('/quizzes/delete/{quiz}', [AdminController::class, 'destroyQuiz'])
            ->name('quizzes.destroy');

        // Handling Articles
        Route::get('/articles', [AdminController::class, 'showArticles'])
            ->name('articles.index');
        Route::get('/articles/create', [AdminController::class, 'showArticlesCreate'])
            ->name('articles.create');
        Route::post('/articles/store', [AdminController::class, 'storeArticle'])
            ->name('articles.store');
        Route::get('/articles/{article}', [AdminController::class, 'showArticlesEdit'])
            ->name('articles.edit');
        Route::put('/articles/{article}', [AdminController::class, 'updateArticle'])
            ->name('articles.update');
        Route::delete('/articles/{article}', [AdminController::class, 'destroyArticle'])
            ->name('articles.destroy');

        // Handling Tickets
        Route::get('/tickets', [AdminController::class, 'showTickets'])
            ->name('tickets.index');
        Route::get('/tickets/{ticket}', [AdminController::class, 'showTicket'])
            ->name('tickets.show');
        Route::put('/tickets/{ticket}', [AdminController::class, 'updateTicket'])
            ->name('tickets.update');
        Route::delete('/tickets/{ticket}', [AdminController::class, 'destroyTicket'])
            ->name('tickets.destroy');

        // (you can add other AdminController routes here later)
    });

// Support related routes - SupportController - Handles customer support functions
Route::get('/support/create', [SupportController::class, "create"])
    ->middleware('auth')
    ->name('supportcreate');
Route::post('/support/ticket', [SupportController::class, 'store'])
    ->middleware('auth')
    ->name('supportstore');

// Payment / Credits / Premium related routes - PremiumController - Handles all things payment related.
Route::get('/checkout', [PremiumController::class, 'show'])
    ->middleware('auth')->name('checkoutshow');
Route::post('/checkout', [PremiumController::class, 'checkoutCredits'])
    ->middleware('auth')->name('checkoutprocess');
Route::get('/checkout/success', [PremiumController::class, 'success'])
    ->middleware('auth')->name('checkoutsuccess');
Route::get('/checkout/cancel', [PremiumController::class, 'cancel'])
    ->middleware('auth')->name('checkoutcancel');
// **No auth middleware** on the webhook so Stripe can call it
Route::post('/stripe/webhook', [PremiumController::class, 'webhook'])
    ->name('stripewebhook');


// Education Center Routes - EducationController - Handles all things Education-section related.
Route::get('/education-section/{track}/{article}', [EducationController::class, "showArticle"])->middleware('auth')->name('educationarticle');
Route::get('/education-section/{track}', [EducationController::class, "showTrack"])->middleware('auth')->name('educationtrack');
Route::get('/education-section', [EducationController::class, "showEducationSection"])->middleware('auth')->name('educationsection');


// Quizzes Center Routes - QuizzesController - Handles all things Quiz-section related.
Route::get('/quizzes-section/{id}/quizdetail/{quizID}', [QuizzesController::class, "viewSingleQuizDetails"])
    ->middleware('auth')
    ->name('quizdetailindividual');
Route::get('/quizzes-section/{id}/quizdetail', [QuizzesController::class, "viewAllQuizDetails"])->middleware('auth')
    ->name('quizdetails');
Route::put('/quizzes-section/{id}/newquiz/{quizID}', [QuizzesController::class, "storeNewQuiz"])
    ->middleware('auth')
    ->name('quizsessionstore');
Route::post('/quizzes-section/{id}/newquiz', [QuizzesController::class, 'startNewQuiz'])
    ->middleware('auth')
    ->name('quizsession');
Route::get(
    '/quizzes-section/{id}/quiz/{quizID}',
    [QuizzesController::class, 'displayQuizSession']
)->middleware(['auth', 'stopMaliciousSession'])->name('quizsessiondisplay');
// Route::get('/quizzes-section/{id}/newquiz', [QuizzesController::class, "startNewQuiz"])->middleware('auth')->name('quizsession');
Route::get('/quizzes-section/{id}', [QuizzesController::class, "showQuizzesSection"])->middleware('auth')->name('quizzessection');


// Settings Routes - SettingsController - Handles settings related routes.
Route::get('/settings', [SettingsController::class, "showSettings"])->middleware('auth')->name('settings');


// Profile Routes - ProfileController - Handles profile editing (change email, name, password and other features like premium)
Route::put('/profile/updatepass/{id}', [ProfileController::class, "updateProfilePass"])->middleware('auth')->name('profpass');
Route::put('/profile/update/{id}', [ProfileController::class, "updateProfileInfo"])->middleware('auth')->name('profinfo');
Route::get('/profile/{id}', [ProfileController::class, "showProfile"])->middleware('auth')->name('profile');


// Basic Routes - UserController - Handles Authentication, Registry, Landing page.
Route::get('/api/auth/google/callback', [UserController::class, 'googleRedirect'])->middleware('guest');
Route::get('/api/auth/google', [UserController::class, 'google'])->middleware('guest')->name('google');
Route::get('/auth/sign-in/github/redirect', [UserController::class, "githubRedirect"])->middleware('guest');
Route::get('/auth/sign-in/github', [UserController::class, "github"])->middleware('guest')->name('github');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth')->name('logout');
Route::get('/dashboard', [UserController::class, "showDashboard"])->middleware('auth')->name('dashboard');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware(['throttle:login', 'guest']);
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
// quiz - DONE
// educational content - DONE
// premium - Partially DONE (added test version credits, need to do premium, and production version of both)
// quizsessiondisplay route: must add middleware to ensure it cannot be called or display from address bar - DONE
// Rate Limit throttling general purpose -
// Incorrect attempts for login - DONE
// admin - DONE
// OAUth (Github / Google) - DONE
// SEO - DONE
// sentry / logging - 
// pulse metrics - 
// Analytics - 
// language packs - 