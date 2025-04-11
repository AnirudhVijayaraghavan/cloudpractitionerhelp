<x-commonhtml>

    <body class="flex flex-col min-h-screen font-inter bg-gray-50 text-gray-800">
        <!-- Header (Responsive with Mobile Navigation) -->
        <header x-data="{ open: false }" class="bg-white shadow">
            <div class="container mx-auto px-6 py-4 flex items-center justify-between">
                <div>
                    <a class="text-2xl font-bold text-gray-800" href="/">
                        CloudPractitionerHelp
                    </a>
                </div>
                @auth
                    <nav class="flex flex-nowrap items-center space-x-2">
                        <a href="{{ route('dashboard') }}"
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
                        <a href="{{ route('login') }}"
                            class="text-gray-600 hover:text-gray-800 text-xs md:text-sm px-2 py-1 md:px-4 md:py-2 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
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

        <!-- Footer -->
        <footer class="bg-white border-t">
            <div class="container mx-auto px-6 py-4 text-center">
                <p class="text-gray-600">&copy; {{ date('Y') }} CloudPractitionerHelp. All rights reserved.</p>
            </div>
        </footer>
    </body>

</x-commonhtml>
