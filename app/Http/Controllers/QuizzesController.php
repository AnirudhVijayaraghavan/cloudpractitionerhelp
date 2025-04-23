<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quizzes;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuizQuestions;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class QuizzesController extends Controller
{
    //

    public function viewSingleQuizDetails(User $id, Quizzes $quizID)
    {
        $gateAuthorization = Gate::inspect('view', $id);
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view('quiz-details', [
            'quiz' => $quizID
        ]);
    }
    protected function endTest($isCheating, Request $request, Quizzes $quizID)
    {
        if ($isCheating === 'y') {

            $latestQuiz = auth()->user()->quizzes()->latest()->first();
            if (!$latestQuiz || $quizID->id !== $latestQuiz->id) {
                // Option: Abort with a 403 error if the quizID does not match the latest quiz.
                $latestQuiz->update([
                    'finished_at' => now(),
                    'score' => 0,
                    'status' => 'terminated',
                ]);
                foreach ($latestQuiz->quizQuestions as $quizQuestion) {

                    // Update each QuizQuestion record with the user's answer and if it was correct.
                    $quizQuestion->update([
                        'user_answer' => "N/A",
                        'is_correct' => false,
                    ]);
                    $quizQuestion->save();
                }
                return -1;
            }
            // Mark the quiz as completed and update finish time and score.
            $quizID->update([
                'finished_at' => now(),
                'score' => 0,
                'status' => 'terminated',
            ]);
            foreach ($quizID->quizQuestions as $quizQuestion) {

                // Update each QuizQuestion record with the user's answer and if it was correct.
                $quizQuestion->update([
                    'user_answer' => "N/A",
                    'is_correct' => false,
                ]);
                $quizQuestion->save();
            }
            return 0;
        } else {
            if (!$request->has('auto_submit')) {
                $request->validate([
                    'answers' => 'required|array'
                ]);
            } else {
                // For auto submission, if 'answers' is missing, provide an empty array.
                $request->merge(['answers' => $request->input('answers', [])]);
            }
            $totalQuestions = $quizID->quizQuestions()->count();
            $correctCount = 0;

            foreach ($quizID->quizQuestions as $quizQuestion) {
                $question = $quizQuestion->question;
                $userAnswer = $request->input("answers.{$quizQuestion->id}");

                $isCorrect = $userAnswer === $question->correct_answer;
                if ($isCorrect) {
                    $correctCount++;
                }

                // Update each QuizQuestion record with the user's answer and if it was correct.
                $quizQuestion->update([
                    'user_answer' => $userAnswer,
                    'is_correct' => $isCorrect,
                ]);
                $quizQuestion->save();
            }

            // Calculate the score as a percentage.
            $score = $totalQuestions > 0 ? round(($correctCount / $totalQuestions) * 100, 2) : 0;

            // Mark the quiz as completed and update finish time and score.
            $quizID->update([
                'finished_at' => now(),
                'score' => $score,
                'status' => 'completed',
            ]);
            return $score;
        }
    }
    public function storeNewQuiz(User $id, Quizzes $quizID, Request $request)
    {
        // return auth()->user()->quizzes()->latest()->first();
        $gateAuthorization = Gate::inspect('update', $id);
        if ($gateAuthorization->denied()) {
            $rc = $this->endTest('y', $request, $quizID);
            if ($rc === 0) {
                return redirect('dashboard')->with('failure', 'Unauthorized. The test has ended.');
            } else if ($rc === -1) {
                // to be edited.
                return redirect('dashboard')->with('failure', 'Unauthorized. You cannot change the URL maliciously.');
            }
        }
        $latestQuiz = auth()->user()->quizzes()->latest()->first();
        if (!$latestQuiz || $quizID->id !== $latestQuiz->id) {
            $this->endTest('y', $request, $latestQuiz);
            return redirect('dashboard')->with('failure', 'Unauthorized. Why try ?');
        }
        $score = $this->endTest('n', $request, $quizID);
        return redirect()->route('quizzessection', [$id->id])->with('success', "Quiz completed! Your score is {$score}%.");

    }
    public function displayQuizSession(User $id, Quizzes $quizID)
    {
        // Gate: ensure $quiz->user_id === $user->id, status in‑progress, etc.
        //Gate::authorize('view', $quiz);
        $gateAuthorization = Gate::inspect('view', $id);
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view('quizsession', ['quiz' => $quizID]);
    }
    public function startNewQuiz(Request $request, User $id)
    {
        // 1) Reject if JS flag wasn’t set
        if ((int) $request->input('js_enabled', 0) !== 1) {
            return back()->with('failure', 'You must have JavaScript enabled to start a quiz.');
        }
        // If they already have an in-progress quiz, redirect them back to it.
        $inProgress = $id->quizzes()->where('status', 'in-progress')->latest()->first();
        if ($inProgress) {
            //$this->endTest('n', $request, $latestQuiz);
            return redirect()
                ->route('quizsessiondisplay', ['id' => $id->id, 'quizID' => $inProgress->id])
                ->with('success', 'You already have an active quiz. Continue it instead of starting a new one.');
        }
        $gateAuthorization = Gate::inspect('view', $id);
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $quizCost = 1;
        if ($id->credits <= 0) {
            return back()->with('failure', 'You do not have enough credits. Please purchase more, through our paid plan.');
        } else {
            // Deduct quiz cost from the user's credits
            $id->decrement('credits', $quizCost);
            // Initializing a Quiz instance.
            $newQuiz = Quizzes::create([
                'user_id' => $id->id,
                'started_at' => now(),
                'status' => 'in-progress'
            ]);

            // Randomly select, for example, 10 questions from your question bank
            $questions = Question::inRandomOrder()->limit(65)->get();

            // Create associated QuizQuestion records
            foreach ($questions as $index => $question) {
                QuizQuestions::create([
                    'quiz_id' => $newQuiz->id,
                    'question_id' => $question->id,
                    'order' => $index + 1,
                ]);
            }
            // Refresh the quiz instance to reload relationships
            // $newQuiz->refresh();
            // Return the quiz session view with the newly created quiz
            // return view('quizsession', [
            //     'quiz' => $newQuiz
            // ]);
            return redirect()->route('quizsessiondisplay', ['id' => $id->id, 'quizID' => $newQuiz->id]);
        }

    }
    public function showQuizzesSection(User $id)
    {
        $quizzes = $id->quizzes()->latest();

        $gateAuthorization = Gate::inspect('view', $id);
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        } else {
            return view('quizzes-center', [
                'userQuizzesData' => $id,
                'quizzes' => $quizzes->paginate(10)
            ]);
        }
    }
}
