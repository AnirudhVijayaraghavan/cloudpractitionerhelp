<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-12 space-y-10">

        {{-- Page Header + Summary Cards --}}
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800">All Quiz Details</h1>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-4 gap-6">
                {{-- Total Quizzes --}}
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <p class="text-4xl font-semibold text-blue-600">
                        {{ auth()->user()->quizzes()->count() }}</p>
                    <p class="text-gray-600">Total Quizzes</p>
                </div>
                {{-- Average Score --}}
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <p class="text-4xl font-semibold text-green-600">
                        {{ round($quizzes->avg('score') ?? 0, 2) }}%
                    </p>
                    <p class="text-gray-600">Average Score</p>
                </div>
                {{-- Completed --}}
                <div class="bg-purple-50 rounded-lg p-4 text-center">
                    <p class="text-4xl font-semibold text-purple-600">
                        {{ $quizzes->where('status', 'completed')->count() }}
                    </p>
                    <p class="text-gray-600">Completed</p>
                </div>
                {{-- Terminated --}}
                <div class="bg-red-50 rounded-lg p-4 text-center">
                    <p class="text-4xl font-semibold text-red-600">
                        {{ $quizzes->where('status', 'terminated')->count() }}
                    </p>
                    <p class="text-gray-600">Terminated</p>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <input type="text" placeholder="🔍 Search by date or score..."
                class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                x-model="search" @input.debounce.300ms="/* hook for live filter if desired */" />
            <select class="w-full md:w-auto px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                x-model="sortBy" @change="/* hook for live sort if desired */">
                <option value="date_desc">Date: Newest</option>
                <option value="date_asc">Date: Oldest</option>
                <option value="score_desc">Score: High to Low</option>
                <option value="score_asc">Score: Low to High</option>
            </select>
        </div>

        {{-- Quiz List --}}
        <div class="space-y-6">
            @foreach ($quizzes as $quiz)
                <div
                    class="bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                    {{-- Date & Status --}}
                    <div class="flex-1">
                        <p class="text-lg font-medium text-gray-800">
                            {{ $quiz->created_at->format('M d, Y H:i') }}
                        </p>
                        <span
                            class="inline-block mt-1 px-3 py-1 text-sm font-semibold rounded-full
                       {{ $quiz->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($quiz->status) }}
                        </span>
                    </div>

                    {{-- Progress Bar --}}
                    <div class="flex-1">
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="h-full bg-blue-600" style="width: {{ $quiz->score }}%">
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-700">{{ $quiz->score }}%</p>
                    </div>

                    {{-- Details Button --}}
                    <div class="flex-1 text-right">
                        <a href="{{ route('quizdetailindividual', ['id' => auth()->user()->id, 'quizID' => $quiz->id]) }}"
                            class="inline-block px-5 py-2 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="">
            {{ $quizzes->links() }}
        </div>

    </main>
</x-headerfooter>
