<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quizzes;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuizQuestions;
use Illuminate\Support\Facades\Gate;
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
    protected function endTest(Request $request, Quizzes $quizID)
    {
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
    }
    public function storeNewQuiz(User $id, Quizzes $quizID, Request $request)
    {
        //dd($id->id, $quizID->id, $quizID->exists, $quizID->toArray(), $quizID->quizQuestions()->get());
        $gateAuthorization = Gate::inspect('update',$quizID);
        if ($gateAuthorization->denied()) {
            $this->endTest($request, $quizID);
            return redirect('dashboard')->with('failure', 'Unauthorized. The test has ended.');
        }

        // If this is a manual submission (no auto_submit flag),
        // then require at least some answers.
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
        return redirect()->route('quizzessection', [$id->id])->with('success', "Quiz completed! Your score is {$score}%.");

    }
    public function startNewQuiz(User $id)
    {
        $gateAuthorization = Gate::inspect('update', $id);
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
            $questions = Question::inRandomOrder()->limit(10)->get();

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
            return view('quizsession', [
                'quiz' => $newQuiz
            ]);
        }

    }
    public function showQuizzesSection(User $id)
    {
        $quizzes = $id->quizzes()->get();

        $gateAuthorization = Gate::inspect('view', $id);
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        } else {
            return view('quizzes-center', [
                'userQuizzesData' => $id,
                'quizzes' => $quizzes
            ]);
        }
    }
}
