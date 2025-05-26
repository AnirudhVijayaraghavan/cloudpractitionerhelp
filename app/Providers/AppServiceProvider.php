<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
        // Paginator::useBootstrapFive();
        //Gate::policy(User::class, UserPolicy::class);
        // Gate::policy(User::class, QuizPolicy::class);
        Gate::define('admin', fn($user) => $user->isAdmin);
        RateLimiter::for('login', function (Request $request) {
            $email = Str::lower((string) $request->input('email'));
            $key = "{$email}|{$request->ip()}";

            return Limit::perMinute(5)
                ->by($key)
                ->response(function (Request $request, array $headers) {
                    $retryAfter = $headers['Retry-After'] ?? $headers['X-RateLimit-Reset'] ?? 60;

                    return redirect()->back()
                        ->withInput($request->only('email'))
                        ->withErrors([
                            'email' => "Too many login attempts. Please try again in {$retryAfter} seconds.",
                        ]);
                });
        });
    }
}
