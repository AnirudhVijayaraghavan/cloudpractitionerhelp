<?php

namespace App\Providers;

use App\Models\Quizzes;
use App\Models\User;
use App\Policies\QuizPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Quizzes::class, QuizPolicy::class);
    }
}
