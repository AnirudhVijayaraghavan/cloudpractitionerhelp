{{-- resources/views/admin/quizzes/show.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Quiz Details')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Quiz #{{ $quiz->id }}</h1>
    <div class="bg-white p-6 rounded-lg shadow space-y-4">
        <p><strong>User:</strong> {{ $quiz->user->name }} ({{ $quiz->user->email }})</p>
        <p><strong>Status:</strong> {{ $quiz->status }}</p>
        <p><strong>Score:</strong> {{ $quiz->score ?? '—' }}</p>
        <p><strong>Started:</strong> {{ $quiz->started_at }}</p>
        <p><strong>Finished:</strong> {{ $quiz->finished_at }}</p>

        <h2 class="text-xl font-semibold mt-6">Questions & Answers</h2>
        <ul class="divide-y">
            @foreach ($quiz->quizQuestions as $qq)
                <li class="py-2">
                    <p class="font-semibold">Quiz Question Number: {{ $qq->id }}, Question Bank Number: {{ $qq->question->id }}, {{ $qq->question->text }}</p>
                    <p>Your answer: <span class="{{ $qq->is_correct ? 'text-green-600' : 'text-red-600' }}">
                            {{ $qq->user_answer }}</span>
                    </p>
                    @if ($qq->question->explanation)
                        <p class="text-sm text-gray-500">Explain: {{ $qq->question->explanation }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
