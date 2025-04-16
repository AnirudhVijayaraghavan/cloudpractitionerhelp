<x-headerfooter>
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white">
                Clearing the AWS CCP exam is hard. <br /> We've made it easy.
            </h1>
            <p class="mt-6 text-lg text-blue-100">
                Discover a new way to test your knowledge with AI-assisted quizzes designed just for you.
            </p>
            <div class="mt-8">
                <a wire:navigate href="{{ route('register') }}"
                    class="px-8 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-gray-100 transition">
                    Get Started
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    <!-- Example icon (you can replace with your own) -->
                    <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 20l-5.447-2.724A2 2 0 013 15.382V6a2 2 0 012-2h14a2 2 0 012 2v9.382a2 2 0 01-1.553 1.894L15 20m0 0v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6m8 0h-4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Smart Generation</h3>
                <p class="text-gray-600">
                    AI-powered quiz generation that tailors questions to your learning progress.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1 4v-4m2 4h1v-4h-1m-2 0h1m1 0v-4a4 4 0 00-8 0v4a4 4 0 01-4 4h16a4 4 0 01-4-4z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Real-Time Feedback</h3>
                <p class="text-gray-600">
                    Instant insights and analysis to help you improve while you learn.
                </p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.657 0-3 1.567-3 3.5S10.343 15 12 15s3-1.567 3-3.5S13.657 8 12 8z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 12.5C19.5 17.194 16.194 21 12 21S4.5 17.194 4.5 12.5 7.806 4 12 4s7.5 3.806 7.5 8.5z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Adaptive Learning</h3>
                <p class="text-gray-600">
                    A personalized experience that evolves with your skills and progress.
                </p>
            </div>
        </div>
    </section>

    <!-- Pricing / Call-to-Action Section -->
    <section id="pricing" class="bg-gray-100 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-8">Pricing</h2>
            <p class="mb-8 text-gray-600">
                Choose a plan that fits your needs. Start with a free trial today!
            </p>
            <a wire:navigate href="{{ route('register') }}"
                class="px-8 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition">
                Start Free Trial
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
        <div class="max-w-2xl mx-auto text-center">
            <p class="text-gray-600">
                We are passionate about revolutionizing the way you learn. Our AI-driven platform offers innovative
                quiz
                experiences designed to empower your learning journey. We help you unlock your full potential
                through
                smart and adaptive technology.
            </p>
        </div>
    </section>
</x-headerfooter>