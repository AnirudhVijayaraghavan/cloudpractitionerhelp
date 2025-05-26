{{-- resources/views/admin/dashboard.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <x-heroicon-o-user-group class="w-6 h-6 text-blue-600" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $totalUsers }}</h3>
                <p class="text-gray-500">Total Users</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <x-heroicon-o-question-mark-circle class="w-6 h-6 text-green-600" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $activeQuizzes }}</h3>
                <p class="text-gray-500">Active Quizzes</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <div class="p-3 bg-indigo-100 rounded-full">
                <x-heroicon-o-check-circle class="w-6 h-6 text-indigo-600" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $completedQuizzes }}</h3>
                <p class="text-gray-500">Completed Quizzes</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <div class="p-3 bg-yellow-100 rounded-full">
                <x-heroicon-o-clipboard-document-list class="w-6 h-6 text-yellow-600" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $totalQuestions }}</h3>
                <p class="text-gray-500">Questions Created</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <div class="p-3 bg-red-100 rounded-full">
                <x-heroicon-o-exclamation-triangle class="w-6 h-6 text-red-600" />
            </div>
            <div class="ml-4">
                <h3 class="text-2xl font-semibold">{{ $openTickets }}</h3>
                <p class="text-gray-500">Open Support Tickets</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        {{-- Placeholder charts --}}
        @foreach (['User Sign-ups Over Time', 'Quiz Completion Rates'] as $title)
            <div class="bg-white p-6 rounded-lg shadow">
                <h4 class="text-lg font-semibold mb-4">{{ $title }}</h4>
                <div
                    class="h-56 bg-gray-100 border-2 border-dashed rounded-lg flex items-center justify-center text-gray-400">
                    {{-- Replace with your chart component --}}
                    Placeholder Chart
                </div>
            </div>
        @endforeach
    </div>

    {{-- Quick Links --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h4 class="text-lg font-semibold mb-4">Quick Actions</h4>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-blue-50 transition">
                <x-heroicon-o-user class="w-6 h-6 text-blue-500 mr-2" />
                Users
            </a>
            <a href="{{ route('admin.questions.index') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-green-50 transition">
                <x-heroicon-o-question-mark-circle class="w-6 h-6 text-green-500 mr-2" />
                Questions
            </a>
            <a href="{{ route('admin.quizzes.index') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-indigo-50 transition">
                <x-heroicon-o-clipboard-document-list class="w-6 h-6 text-indigo-500 mr-2" />
                Quizzes
            </a>
            <a href="{{ route('admin.articles.index') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition">
                <x-heroicon-o-document-text class="w-6 h-6 text-yellow-500 mr-2" />
                Articles
            </a>
            <a href="{{ route('admin.tickets.index') }}"
                class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-red-50 transition">
                <x-heroicon-o-chat-bubble-oval-left-ellipsis class="w-6 h-6 text-red-500 mr-2" />
                Tickets
            </a>
        </div>
    </div>
@endsection
