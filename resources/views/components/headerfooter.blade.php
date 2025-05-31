<x-commonhtml>

    <body class="flex flex-col min-h-screen font-inter bg-gray-50 text-gray-800">
        <header x-data="{ open: false }" class="bg-white shadow">
            <div class="container mx-auto px-6 py-4 flex items-center justify-between">
                <div>
                    <a wire:navigate class="flex items-center text-gray-800" href="/">
                        <img src="{{ asset('favicon-32x32.png') }}" class="h-8 w-8" />

                        <span class="ml-2 text-2xl font-bold hidden sm:inline">
                            CloudPractitionerHelp
                        </span>
                    </a>
                </div>
                @auth
                    <nav class="flex flex-nowrap items-center space-x-2">
                        @if (auth()->user()->isAdmin)
                            <a wire:navigate href="{{ route('admin.dashboard') }}"
                                class="text-gray-600 hover:text-gray-800 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 transition">
                                Admin
                            </a>
                        @endif
                        <a wire:navigate href="{{ route('dashboard') }}"
                            class="text-gray-600 hover:text-gray-800 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 transition">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="cursor text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Log Out
                            </button>
                        </form>
                    </nav>
                @else
                    <nav class="flex flex-nowrap items-center space-x-2">
                        <a wire:navigate href="{{ route('login') }}"
                            class="text-gray-600 hover:text-gray-800 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 transition">
                            Login
                        </a>
                        <a wire:navigate href="{{ route('register') }}"
                            class="text-gray-600 hover:text-gray-800 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 transition">
                            Register
                        </a>
                    </nav>
                @endauth
            </div>
        </header>

        {{-- Notification Container --}}
        @if (session()->has('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                class="fixed top-17 right-0 z-50 transform transition-all duration-300 ease-out bg-green-500 text-white rounded-lg shadow-lg px-6 py-4">
                <div class="flex items-center">
                    <div class="flex-1">
                        {{ session('success') }}
                    </div>
                    <button @click="show = false" class="ml-4 text-2xl leading-none focus:outline-none">
                        &times;
                    </button>
                </div>
            </div>
        @endif

        @if (session()->has('failure'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                class="fixed top-17 right-0 z-50 transform transition-all duration-300 ease-out bg-red-500 text-white rounded-lg shadow-lg px-6 py-4">
                <div class="flex items-center">
                    <div class="flex-1">
                        {{ session('failure') }}
                    </div>
                    <button @click="show = false" class="ml-4 text-2xl leading-none focus:outline-none">
                        &times;
                    </button>
                </div>
            </div>
        @endif

        {{ $slot }}

        <!-- Updated Footer -->
        <footer class="bg-white border-t border-gray-200">
            <div class="container mx-auto px-6 py-6 flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-600 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} CloudPractitionerHelp. All rights reserved.
                </p>
                <div class="flex items-center space-x-4">
                    <a wire:navigate href="{{ route('privacy') }}"
                        class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        Privacy Policy
                    </a>
                    <span class="text-gray-400">|</span>
                    <a wire:navigate href="{{ route('tos') }}"
                        class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        Terms of Service
                    </a>
                </div>
            </div>
        </footer>
        <livewire:scripts />
        @auth
            {{-- Floating Quick-Actions FAB (everywhere except Dashboard) --}}
            @unless (request()->routeIs('dashboard'))
                <div x-data="{ open: false }" class="fixed bottom-20 right-6 z-50" @keydown.escape.window="open = false">
                    {{-- Open-FAB (plus) --}}
                    <button x-show="!open" @click="open = true"
                        class="w-14 h-14 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg
               flex items-center justify-center transform transition"
                        aria-label="Open Quick Actions">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>

                    {{-- Expanded Menu --}}
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75" @click.away="open = false" class="mt-2 relative">
                        <div class="bg-white rounded-2xl shadow-2xl ring-1 ring-gray-200 p-6 w-56">
                            {{-- Close button inside the card --}}
                            <button @click="open = false"
                                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 focus:outline-none"
                                aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            {{-- Menu links --}}
                            <nav class="space-y-3 mt-1">
                                <a href="{{ route('quizzessection', auth()->user()->id) }}"
                                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-800 font-medium">
                                    Start New Quiz
                                </a>
                                <a href="{{ route('quizdetails', auth()->user()->id) }}"
                                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-800 font-medium">
                                    View Quiz History
                                </a>
                                <a href="{{ route('profile', auth()->user()->id) }}"
                                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-800 font-medium">
                                    Update Profile
                                </a>
                                <a href="{{ route('checkoutshow') }}"
                                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-800 font-medium">
                                    Buy Credits
                                </a>
                                <a href="{{ route('educationsection') }}"
                                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-800 font-medium">
                                    Education Center
                                </a>
                                <a href="{{ route('supportcreate') }}"
                                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-800 font-medium">
                                    Contact Support
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            @endunless
        @endauth


    </body>

</x-commonhtml>
