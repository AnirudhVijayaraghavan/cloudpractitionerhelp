<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Quizzes;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StopMaliciousQuizSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->route('id')->id !== auth()->id()) {
            return redirect('dashboard')->with('failure', 'Unauthorized.');
        }
        $latestQuiz = $request->route('id')->quizzes()->latest()->first();
        if (($request->route('quizID')->id !== $latestQuiz->id) || ($latestQuiz->status !== 'in-progress')) {
            return redirect('dashboard')->with('failure', 'Unauthorized.');
        }
        // Let the request go through...
        $response = $next($request);

        // ...but tell the browser not to cache it
        return $response
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Thu, 01 Jan 1970 00:00:00 GMT');
    }
}
