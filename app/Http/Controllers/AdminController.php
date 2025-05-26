<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quizzes;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    // User CMS Logic
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect(route('admin.users.index'))
            ->with('success', 'User ' . $user->id . ' deleted successfully.');
    }
    public function updateUser(User $user, Request $request)
    {
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
        return view(
            'admin.users.edit',
            [
                'user' => $user
            ]
        );
    }
    public function storeUser(Request $request)
    {
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

        return view('admin.users.create');
    }
    public function showUsers()
    {
        $users = User::orderByDesc('created_at')
            ->paginate(15);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    // Dashboard
    public function index(Request $request)
    {
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
