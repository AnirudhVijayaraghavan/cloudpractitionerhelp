<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-10 space-y-10">
        {{-- Welcome Hero --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg p-6 flex items-center text-white shadow-lg">
            {{-- <img src="{{ auth()->user()->avatar_url ?? asset('images/default-avatar.png') }}"
                alt="{{ auth()->user()->name }}" class="w-16 h-16 rounded-full border-2 border-white mr-6 object-cover"> --}}
            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random"
                class="w-16 h-16 rounded-full border-2 border-white mr-6 object-cover" />
            <div>
                <h1 class="text-2xl font-semibold">Welcome

                    back,
                    {{ auth()->user()->name }}!</h1>
                <p class="opacity-75">Ready to level up your AWS knowledge today?</p>
            </div>
        </div>

        {{-- Key Metrics --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <img src="{{ asset('icons8-saving-64.png') }}" class="h-7 w-7" />
                </div>
                <div>
                    <p class="text-sm text-gray-500">Credits Remaining</p>
                    <p class="text-xl font-bold">{{ auth()->user()->credits }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m2 8H7a4 4 0 01-4-4V7" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Quizzes Completed</p>
                    <p class="text-xl font-bold">{{ auth()->user()->quizzes()->where('status', 'completed')->count() }}
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6 flex items-center">
                <div class="bg-purple-100 p-3 rounded-full mr-4">
                    <img src="{{ asset('icons8-score-50.png') }}" class="h-7 w-7" />
                </div>
                <div>
                    <p class="text-sm text-gray-500">Avg. Score</p>
                    <p class="text-xl font-bold">
                        {{ round(auth()->user()->quizzes()->where('status', 'completed')->avg('score') ?? 0, 2) }}%
                    </p>
                </div>
            </div>
        </div>

        {{-- Main Grid --}}
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            {{-- Quiz Simulator --}}
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold mb-2">Quiz Simulator</h2>
                    <p class="text-gray-600 mb-4">Simulate an exam environment and assess your readiness.</p>
                    <p class="text-gray-800 mb-6">
                        <strong>{{ auth()->user()->credits }}</strong> credits available
                    </p>
                </div>
                <a href="{{ route('quizzessection', auth()->user()->id) }}"
                    class="mt-auto inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Visit Quiz Center
                </a>
            </div>

            {{-- Recent Activity --}}
            <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col">
                <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                @php $recent = auth()->user()->quizzes()->latest()->limit(5)->get(); @endphp
                @if ($recent->isEmpty())
                    <p class="text-gray-600">No quizzes taken yet.</p>
                @else
                    <ul class="space-y-3 mb-4 flex-1 overflow-auto">
                        @foreach ($recent as $quiz)
                            <li class="flex justify-between items-center">
                                <div>
                                    <span class="font-medium">{{ $quiz->created_at->format('M d, Y') }}</span>
                                    — <span class="text-blue-600">{{ $quiz->score }}%</span>
                                </div>
                                <a href="{{ route('quizdetailindividual', ['id' => auth()->user()->id, 'quizID' => $quiz->id]) }}"
                                    class="text-gray-500 hover:text-gray-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('quizdetails', auth()->user()->id) }}"
                        class="text-sm text-blue-600 hover:underline">View All History →</a>
                @endif
            </div>

            {{-- Quick Links --}}
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('quizzessection', auth()->user()->id) }}"
                            class="flex items-center text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Start New Quiz
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('quizdetails', auth()->user()->id) }}"
                            class="flex items-center text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-6h13v6M9 11V5h13v6M4 21v-6h5v6M4 15V9h5v6" />
                            </svg>
                            View Quiz History
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile', auth()->user()->id) }}"
                            class="flex items-center text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.305.498 6.121 1.376M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Update Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('checkoutshow') }}"
                            class="flex items-center text-gray-700 hover:text-gray-900">
                            <img src="{{ asset('icons8-buy-48.png') }}" class="w-5 h-5 mr-2" />
                            Buy Credits
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('educationsection') }}"
                            class="flex items-center text-gray-700 hover:text-gray-900">
                            <img src="{{ asset('icons8-education-50.png') }}" class="w-5 h-5 mr-2" />
                            Education Center
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</x-headerfooter>
