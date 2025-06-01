<x-headerfooter>
    @section('maintitle', 'Free AWS Practice Quizzes & Learning')
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white">
                Clearing the AWS exams are hard. <br /> We've made it easy.
            </h1>
            <p class="mt-6 text-lg text-blue-100">
                Elevate your knowledge with ultra-affordable quizzes, and free learning content to help you clear and
                get certified!
            </p>
            <div class="mt-8">
                @auth
                    <a wire:navigate href="{{ route('dashboard') }}"
                        class="px-8 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-gray-100 transition">
                        Visit Dashboard
                    </a>
                @else
                    <a wire:navigate href="{{ route('register') }}"
                        class="px-8 py-3 bg-white text-blue-600 rounded-full font-semibold hover:bg-gray-100 transition">
                        Get Started
                    </a>
                @endauth

            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Card 1: Smart Generation -->
            <div
                class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 group">
                <div class="bg-blue-100 rounded-full p-4 inline-flex mb-4 group-hover:bg-blue-200 transition-colors">
                    <img src="{{ asset('icons8-quiz-50.png') }}" alt="quiz-icon"/>
                </div>
                <h3 class="text-xl font-semibold mb-2 group-hover:text-blue-600 transition-colors">Quiz Simulation Mode
                </h3>
                <p class="text-gray-600">
                    AI‑powered quiz question creation that adapts to your strengths and weaknesses in real‑time.
                </p>
            </div>

            <!-- Card 2: Question Bookmarking -->
            <div
                class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 group">
                <div
                    class="bg-indigo-100 rounded-full p-4 inline-flex mb-4 group-hover:bg-indigo-200 transition-colors">
                    <img src="{{ asset('icons8-education-50.png') }}" alt="education-icon"/>
                </div>
                <h3 class="text-xl font-semibold mb-2 group-hover:text-indigo-600 transition-colors">Free Learning
                    Content</h3>
                <p class="text-gray-600">
                    Our learning section is free for everyone, and even includes some practice quizzes.
                </p>
            </div>

            <!-- Card 3: Performance Analytics -->
            <div
                class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 group">
                <div
                    class="bg-purple-100 rounded-full p-4 inline-flex mb-4 group-hover:bg-purple-200 transition-colors">
                    <img src="{{ asset('icons8-performance-goal-48.png') }}" alt="performance-icon" />
                </div>
                <h3 class="text-xl font-semibold mb-2 group-hover:text-purple-600 transition-colors">Performance
                    Analytics</h3>
                <p class="text-gray-600">
                    Deep‑dive dashboards track your progress over time—spot trends, strengths, and areas to improve. <b>Coming soon!</b>
                </p>
            </div>

        </div>
    </section>

    <!-- Pricing / Call-to-Action Section -->
    <section id="pricing" class="bg-gray-50 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Choose Your Plan</h2>
            <p class="mb-12 text-gray-600">
                All new users start with <strong>2 free credits</strong>. Pick a plan below to continue your AWS CCP
                prep.
            </p>

            <div class="grid gap-8 md:grid-cols-2">

                <!-- Card: Pay‑As‑You‑Go Credits -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-8 flex flex-col">
                    <div class="mb-6">
                        <img src="{{ asset('icons8-saving-64.png') }}" alt="savings-icon" class="h-12 w-12 mx-auto"/>

                    </div>
                    <h3 class="text-2xl font-semibold mb-2">Pay‑As‑You‑Go Credits</h3>
                    <p class="text-gray-600 mb-6 flex-1">
                        Purchase credits in flexible bundles—only pay for what you use, when you need it.
                    </p>
                    <ul class="text-gray-600 mb-6 space-y-2 text-center mx-auto">
                        <li>2 credits for $1</li>
                        <li>5 credits for $2</li>
                        <li>10 credits for $4</li>
                        <li>20 credits for $10</li>
                    </ul>
                    @auth
                        <a href="{{ route('checkoutshow') }}"
                            class="mt-auto self-center inline-block px-8 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition">
                            Buy Credits
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="mt-auto self-center inline-block px-8 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition">
                            Log in to Buy
                        </a>
                    @endauth
                </div>

                <!-- Card: Premium Subscription -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-8 flex flex-col">
                    <div class="mb-6">
                        <img src="{{ asset('icons8-premium-membership-48.png') }}" alt="premium-icon" class="h-12 w-12 mx-auto"/>

                    </div>
                    <h3 class="text-2xl font-semibold mb-2">Premium Subscription</h3>
                    <p class="text-gray-600 mb-6 flex-1">
                        Unlock unlimited quizzes, advanced analytics, and personalized learning paths—all for one low
                        monthly rate.
                    </p>
                    <ul class="text-gray-600 mb-6 space-y-2 text-center mx-auto">
                        <li>Unlimited quiz attempts</li>
                        <li>In‑depth performance dashboards</li>
                        <li>Personalized study recommendations</li>
                    </ul>
                    @auth
                        <a href="{{ route('profile', auth()->id()) }}"
                            class="mt-auto self-center inline-block px-8 py-3 bg-purple-600 text-white rounded-full font-semibold hover:bg-purple-700 transition">
                            Enable Premium
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                            class="mt-auto self-center inline-block px-8 py-3 bg-purple-600 text-white rounded-full font-semibold hover:bg-purple-700 transition">
                            Start Free Trial
                        </a>
                    @endauth
                </div>

            </div>
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
