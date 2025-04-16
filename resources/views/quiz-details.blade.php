<x-headerfooter>
    <main class="container mx-auto px-6 py-8">
        <!-- Quiz Summary Section -->
        <section class="mb-8">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between">
                    <h1 class="text-2xl font-bold mb-4 sm:mb-0">
                        Quiz Details
                    </h1>
                    <div class="flex space-x-6">
                        <div class="text-center">
                            <p class="text-xl font-semibold">{{ $quiz->score }}%</p>
                            <p class="text-gray-600 text-sm">Score</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xl font-semibold">{{ $quiz->quizQuestions()->count() }}</p>
                            <p class="text-gray-600 text-sm">Total Questions</p>
                        </div>
                        <div class="text-center">
                            @php
                                $correctCount = $quiz->quizQuestions->where('is_correct', true)->count();
                            @endphp
                            <p class="text-xl font-semibold">{{ $correctCount }}</p>
                            <p class="text-gray-600 text-sm">Correct Answers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quiz Questions Detail Table -->
        <section>
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full table-fixed divide-y divide-gray-200">
                    <thead class="bg-blue-100">
                        <tr>
                            <!-- Define fixed column widths using w-[fraction] classes -->
                            <th
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                #
                            </th>
                            <th
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-4/12">
                                Question
                            </th>
                            <th
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                                Your Answer
                            </th>
                            <th
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-3/12">
                                Correct Answer
                            </th>
                            <th
                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                                Result
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($quiz->quizQuestions->sortBy('order') as $quizQuestion)
                            <tr>
                                <td class="px-2 py-2 whitespace-nowrap text-sm">
                                    {{ $quizQuestion->order }}
                                </td>
                                <td class="px-2 py-2 whitespace-normal text-sm">
                                    {{ $quizQuestion->question->text }}
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap text-sm">
                                    {{ $quizQuestion->user_answer }}
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap text-sm">
                                    {{ $quizQuestion->question->correct_answer }}
                                </td>
                                <td class="px-2 py-2 whitespace-nowrap text-sm">
                                    @if ($quizQuestion->is_correct)
                                        <span class="text-green-600 font-bold">Correct</span>
                                    @else
                                        <span class="text-red-600 font-bold">Incorrect</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</x-headerfooter>
