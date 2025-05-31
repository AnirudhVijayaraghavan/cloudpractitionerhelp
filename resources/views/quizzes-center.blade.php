<x-headerfooter>
    @section('maintitle', 'Quizzes Center')
    <main class="flex-grow container mx-auto px-6 py-12 space-y-12">
        {{-- Page Header --}}
        <div class="text-center space-y-2">
            <h1 class="text-4xl font-bold">Quiz Portal</h1>
            <p class="text-gray-600">Choose your AWS track and begin your simulation.</p>
        </div>

        {{-- Track Cards --}}
        <div class="grid gap-8 sm:grid-cols-2">
            {{-- AWS Certified Cloud Practitioner --}}
            <div
                class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition p-8 text-center">
                <img src="{{ asset('aws-ccp-logo.jpg') }}" alt="AWS CCP" class="mx-auto h-24 mb-6" />
                <h2 class="text-2xl font-semibold mb-2">AWS Cloud Practitioner</h2>
                <p class="text-gray-600 mb-6">
                    Practice conceptual overviews, and exam-style quizzes.
                </p>
                <form action="{{ route('quizsession', auth()->user()->id) }}" method="POST">
                    @csrf
                    <!-- JS‑flag: default=0, script will set to 1 -->
                    <input type="hidden" name="js_enabled" id="js_enabled" value="1">
                    <button type="submit"
                        class="cursor-pointer mt-auto inline-block px-6 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition">Start
                        New Quiz</button>
                </form>
            </div>

            {{-- AWS Solutions Architect --}}
            <div class="flex flex-col bg-white rounded-2xl shadow-lg opacity-70 cursor-not-allowed p-8 text-center">
                <img src="{{ asset('aws-sa-logo.jpg') }}" alt="AWS Solutions Architect"
                    class="mx-auto h-24 mb-6 opacity-50" />
                <h2 class="text-2xl font-semibold mb-2">AWS Solutions Architect</h2>
                <p class="text-gray-500 mb-6">
                    Coming soon: deep-dive guides, and mock tests.
                </p>
                <span class="mt-auto inline-block px-6 py-3 bg-gray-400 text-white rounded-full font-semibold">
                    Coming Soon
                </span>
            </div>
        </div>
    </main>
</x-headerfooter>
