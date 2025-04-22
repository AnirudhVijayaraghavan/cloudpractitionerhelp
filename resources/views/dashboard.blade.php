<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <p class="text-gray-700 mb-6">Welcome, {{ auth()->user()->name }}!</p>

        <div class="grid gap-8 md:grid-cols-2">
            <!-- Recent Activity Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Recent Activity</h2>
                <p class="text-gray-600">No recent activity to display.</p>
            </div>

            <!-- Quiz Simulator Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Quiz Simulator</h2>
                <p class="text-gray-600 mb-4">
                    Ready to put your knowledge to the test? Simulate an exam environment and assess your readiness with
                    our interactive quiz simulator.
                </p>
                <p class="text-gray-600 mb-4">
                    You have <strong>{{ auth()->user()->credits }}</strong> quiz generations left.
                </p>
                <a wire:navigate href="/quizzes-section/{{ auth()->user()->id }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Start Quiz Simulator
                </a>
            </div>



            <!-- Quick Links Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Quick Links</h2>
                <ul class="list-disc list-inside text-gray-600">
                    <li><a wire:navigate href="/quizzes-section/{{ auth()->user()->id }}"
                            class="text-blue-600 hover:underline">View
                            Your
                            Quizzes</a></li>
                    <li><a wire:navigate href="/profile/{{ auth()->user()->id }}"
                            class="text-blue-600 hover:underline">Update
                            Profile</a></li>
                    <li><a wire:navigate href="{{ route('checkoutshow') }}"
                            class="text-blue-600 hover:underline">Buy More Credits</a></li>
                </ul>
            </div>

            <!-- Educational Resources Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Educational Resources</h2>
                <p class="text-gray-600 mb-4">
                    Explore our curated collection of tutorials, guides, and articles to boost your skills and help you
                    excel.
                </p>
                <a wire:navigate href="{{ route('educationsection') }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Visit Education Center
                </a>
            </div>
        </div>
    </main>
</x-headerfooter>
