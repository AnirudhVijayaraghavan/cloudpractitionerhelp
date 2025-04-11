<x-commonhtml>

    <body class="bg-gray-50 text-gray-800 transition-colors duration-300 flex items-center justify-center min-h-screen">
        <!-- Registration Form Card -->
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-2xl font-bold">Register</h2>
                <p class="mt-2 text-gray-600">Create your account</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium">Username</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Register
                    </button>
                </div>
            </form>
            <div class="text-center">
                <p class="text-sm">Already have an account? <a href="{{ route('login') }}"
                        class="font-medium text-blue-600 hover:text-blue-500">Log In</a></p>
            </div>
        </div>
    </body>
</x-commonhtml>
