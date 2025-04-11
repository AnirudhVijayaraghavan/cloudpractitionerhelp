<x-headerfooter>

        <!-- Main Content -->
        <main class="flex-grow p-4 container mx-auto px-6 py-8">
            <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
            <p class="text-gray-700 mb-6">Welcome, {{ auth()->user()->name }}!</p>

            <div class="grid gap-8 md:grid-cols-2">
                <!-- Recent Activity Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">Recent Activity</h2>
                    <p class="text-gray-600">No recent activity to display.</p>
                </div>
                <!-- Quick Links Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-2">Quick Links</h2>
                    <ul class="list-disc list-inside text-gray-600">
                        <li><a href="#" class="text-blue-600 hover:underline">View Your Quizzes</a></li>
                        <li><a href="{{ route('profile') }}" class="text-blue-600 hover:underline">Update
                                Profile</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Settings</a></li>
                    </ul>
                </div>
            </div>
        </main>

</x-headerfooter>
