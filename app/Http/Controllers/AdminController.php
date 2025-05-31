<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Quizzes;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //
    // Articles CMS Logic
    public function destroyArticle(Article $article)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $article->delete();
        Cache::flush();
        return redirect(route('admin.articles.index'))
            ->with('success', 'Article ' . $article->id . ' deleted successfully.');
    }
    public function updateArticle(Article $article, Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'track' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('articles', 'slug')->ignore($article->id),
            ],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
        ]);


        $article->update($incomingFields);
        $article->save();
        Cache::flush();
        return redirect(route('admin.articles.index'))
            ->with('success', 'Article ' . $article->id . ' updated successfully.');
    }
    public function showArticlesEdit(Article $article)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view(
            'admin.articles.edit',
            [
                'article' => $article
            ]
        );
    }
    public function storeArticle(Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'track' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('articles', 'slug'),
            ],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);
        if (!array_key_exists('order', $incomingFields) || is_null($incomingFields['order'])) {
            $incomingFields['order'] = Article::count() + 1;
        }
        Article::create($incomingFields);
        Cache::flush();
        return redirect(route('admin.articles.index'))
            ->with('success', 'Article added successfully');
    }
    public function showArticlesCreate()
    {
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view('admin.articles.create');
    }
    public function showArticles()
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $articles = Article::orderByDesc('id')
            ->paginate(15);
        return view('admin.articles.index', [
            'articles' => $articles
        ]);
    }

    // Tickets CMS Logic
    public function destroyTicket(SupportTicket $ticket)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $ticket->delete();
        return redirect(route('admin.tickets.index'))
            ->with('success', 'Ticket ' . $ticket->id . ' deleted successfully.');
    }
    public function updateTicket(Request $request, SupportTicket $ticket)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'status' => ['sometimes', 'in:open,pending,closed'],
            'priority' => ['sometimes', 'in:low,normal,high'],
        ]);

        $ticket->update($incomingFields);

        return redirect()
            ->route('admin.tickets.index')
            ->with('success', 'Ticket status updated!');
    }
    public function showTicket(SupportTicket $ticket)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view(
            'admin.tickets.show',
            [
                'ticket' => $ticket
            ]
        );
    }
    public function showTickets()
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $tickets = SupportTicket::orderByDesc('id')
            ->paginate(15);
        return view(
            'admin.tickets.index',
            [
                'tickets' => $tickets
            ]
        );
    }

    // Quizzes CMS Logic
    public function destroyQuiz(Quizzes $quiz)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $quiz->delete();
        return redirect(route('admin.quizzes.index'))
            ->with('success', 'Quiz ' . $quiz->id . ' deleted successfully.');
    }
    public function showQuiz(Quizzes $quiz)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view(
            'admin.quizzes.show',
            [
                'quiz' => $quiz
            ]
        );
    }
    public function showQuizzes()
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $quizzes = Quizzes::orderByDesc('id')
            ->paginate(15);
        return view(
            'admin.quizzes.index',
            [
                'quizzes' => $quizzes
            ]
        );
    }

    // Questions CMS Logic
    public function destroyQuestion(Question $question)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $question->delete();
        return redirect(route('admin.questions.index'))
            ->with('success', 'Question ' . $question->id . ' deleted successfully.');
    }
    public function updateQuestion(Question $question, Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'text' => 'required|string',
            'options' => 'required|string',  // raw JSON string
            'correct_answer' => 'required|string',
            'explanation' => 'nullable|string',
        ]);
        $options = json_decode($incomingFields['options'], true);
        if (!is_array($options) || count($options) < 2) {
            throw ValidationException::withMessages([
                'options' => ['Options must be a valid JSON array with at least two items.'],
            ]);
        }
        foreach ($options as $opt) {
            if (!is_string($opt) || trim($opt) === '') {
                throw ValidationException::withMessages([
                    'options' => ['Each option must be a non-empty string.'],
                ]);
            }
        }
        if (!in_array($incomingFields['correct_answer'], $options, true)) {
            throw ValidationException::withMessages([
                'correct_answer' => ['The correct answer must exactly match one of the provided options.'],
            ]);
        }

        $question->update($incomingFields);
        $question->save();
        return redirect(route('admin.questions.index'))
            ->with('success', 'Question ' . $question->id . ' updated successfully.');
    }
    public function showQuestionsEdit(Question $question)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view(
            'admin.questions.edit',
            [
                'question' => $question
            ]
        );
    }
    public function storeQuestion(Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'text' => 'required|string',
            'options' => 'required|string',  // raw JSON string
            'correct_answer' => 'required|string',
            'explanation' => 'nullable|string',
        ]);
        $options = json_decode($incomingFields['options'], true);
        if (!is_array($options) || count($options) < 2) {
            throw ValidationException::withMessages([
                'options' => ['Options must be a valid JSON array with at least two items.'],
            ]);
        }
        foreach ($options as $opt) {
            if (!is_string($opt) || trim($opt) === '') {
                throw ValidationException::withMessages([
                    'options' => ['Each option must be a non-empty string.'],
                ]);
            }
        }
        if (!in_array($incomingFields['correct_answer'], $options, true)) {
            throw ValidationException::withMessages([
                'correct_answer' => ['The correct answer must exactly match one of the provided options.'],
            ]);
        }
        Question::create($incomingFields);
        return redirect(route('admin.questions.index'))
            ->with('success', 'Question added successfully');
    }
    public function showQuestionsCreate()
    {
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view('admin.questions.create');
    }
    public function showQuestions()
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $questions = Question::orderByDesc('id')
            ->paginate(15);
        return view('admin.questions.index', [
            'questions' => $questions
        ]);
    }

    // User CMS Logic
    public function destroyUser(User $user)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $user->delete();
        return redirect(route('admin.users.index'))
            ->with('success', 'User ' . $user->id . ' deleted successfully.');
    }
    public function updateUser(User $user, Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'name' => ['nullable', 'string', 'min:3', 'max:25'],
            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'credits' => ['nullable', 'integer', 'min:0'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);
        $incomingFields['isAdmin'] = $request->boolean('isAdmin');
        $incomingFields['isPremium'] = $request->boolean('isPremium');
        if (!empty($incomingFields['password'])) {
            $incomingFields['password'] = Hash::make($incomingFields['password']);
        } else {
            unset($incomingFields['password']);
        }
        $user->update($incomingFields);
        $user->save();
        return redirect(route('admin.users.index'))
            ->with('success', 'User ' . $user->id . ' updated successfully.');
    }
    public function showUsersEdit(User $user)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view(
            'admin.users.edit',
            [
                'user' => $user
            ]
        );
    }
    public function storeUser(Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $incomingFields = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:25'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'credits' => ['required', 'integer', 'min:2'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $incomingFields['isAdmin'] = $request->boolean('isAdmin');
        $incomingFields['isPremium'] = $request->boolean('isPremium');
        if (!empty($incomingFields['password'])) {
            $incomingFields['password'] = Hash::make($incomingFields['password']);
        } else {
            unset($incomingFields['password']);
        }
        User::create($incomingFields);
        return redirect(route('admin.users.index'))
            ->with('success', 'User added successfully');
    }
    public function showUsersCreate()
    {
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        return view('admin.users.create');
    }
    public function showUsers()
    {
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $users = User::orderByDesc('created_at')
            ->paginate(15);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    // Dashboard
    public function index(Request $request)
    {   
        $gateAuthorization = Gate::inspect('view', auth()->user());
        if ($gateAuthorization->denied()) {
            return back()->with('failure', 'Unauthorized.');
        }
        $totalUsers = User::count();
        $activeQuizzes = Quizzes::where('status', 'in-progress')->count();
        $completedQuizzes = Quizzes::where('status', 'completed')->count();
        $totalQuestions = Question::count();
        $openTickets = SupportTicket::where('status', 'open')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeQuizzes',
            'completedQuizzes',
            'totalQuestions',
            'openTickets'
        ));
    }


}
