<x-commonhtml>
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

    <body class="bg-gray-50 text-gray-800 flex flex-col items-center justify-center min-h-screen mt-4">
        <!-- Login Form Card -->
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Log In</h2>
                <p class="mt-2 text-gray-600">Sign in to your account</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full px-4 py-2 border rounded-md bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full px-4 py-2 border rounded-md bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="hidden" name="remember" value="0">
                        <input id="remember" name="remember" type="checkbox" value="1"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                        <label for="remember" class="ml-2 block text-sm">Remember me</label>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
                        Log In
                    </button>
                </div>
            </form>
            <div class="text-center">
                <p class="text-sm">
                    Don't have an account?
                    <a wire:navigate href="{{ route('register') }}" class="text-blue-600 hover:underline">
                        Register
                    </a>
                </p>
            </div>
        </div>

        {{-- separator --}}
        <hr class="w-full max-w-md border-gray-300 my-6" />

        <!-- Social Login Logos -->
        <div class="w-full max-w-md flex flex-col items-center space-y-4">
            <p class="text-gray-600">Or continue with</p>
            <div class="flex space-x-6">
                <a href="{{ route('github') }}">
                    <img src="{{ asset('github-mark.png') }}" alt="GitHub" class="h-8 w-auto" />
                </a>
                <a href="">
                    <img src="{{ asset('icons8-google-48.png') }}" alt="Google" class="h-8 w-auto" />
                </a>
            </div>
        </div>
    </body>
</x-commonhtml>
