<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Quiz Portal</h1>
        <p class="text-gray-700 mb-6">
            Take a new quiz simulation or review your previous quiz attempts below.
        </p>

        <!-- New Quiz Button -->
        <div class="mb-8 text-center">
            <a wire:navigate href="{{ route('quizsession',$userQuizzesData->id) }}"
                class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition">
                Start New Quiz
            </a>
        </div>

        <!-- Quiz History Section -->
        <div>
            <h2 class="text-2xl font-semibold mb-4">Your Quiz History at a glance, {{ $userQuizzesData->name }}</h2>
            @if ($quizzes->isEmpty())
                <p class="text-gray-600">You haven't taken any quizzes yet. Start your first quiz now!</p>
            @else
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="w-full table-auto">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Date</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Score</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                                <tr class="border-t">
                                    <td class="px-4 py-2 text-sm text-gray-700">
                                        {{ $quiz->created_at->format('M d, Y') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $quiz->score }}%</td>
                                    <td class="px-4 py-2 text-sm text-gray-700">{{ $quiz->status }}</td>
                                    <td class="px-4 py-2 text-sm text-blue-600 hover:underline">
                                        <a href="{{ route('quizdetailindividual',['id' => auth()->user()->id, 'quizID' => $quiz->id]) }}">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
</x-headerfooter>
