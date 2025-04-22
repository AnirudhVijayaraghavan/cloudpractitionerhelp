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
            return redirect('dashboard')->with('failure', 'Unauthorized, bad user, why try ? from middleware');
        }
        $latestQuiz = $request->route('id')->quizzes()->latest()->first();
        if (($request->route('quizID')->id !== $latestQuiz->id) || ($latestQuiz->status !== 'in-progress')) {
            return redirect('dashboard')->with('failure', 'Unauthorized, bad quiz, why try ? from middleware');
        }
        return $next($request);
    }
}
