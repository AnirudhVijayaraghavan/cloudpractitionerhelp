<x-headerfooter>

    <body class="bg-gray-50 text-gray-800 transition-colors duration-300 min-h-screen">
        <div class="container mx-auto px-6 py-10">
            <h1 class="text-3xl font-bold mb-8">Profile</h1>
            <!-- Grid layout:
                 On mobile: one column.
                 On md+ screens: 3 columns and 2 rows.
                 Profile Info: occupies row 1, columns 1-2.
                 Update Password: occupies row 2, columns 1-2.
                 Premium card: occupies rows 1-2, column 3.
            -->
            <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-8">
                <!-- Profile Information Card -->
                <div class="md:col-span-2 md:row-start-1 bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Profile Information</h2>
                    <form method="POST" action="{{ route('dashboard') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-50 py-2 px-4 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
                            Update Profile
                        </button>
                    </form>
                </div>

                <!-- Update Password Card -->
                <div class="md:col-span-2 md:row-start-2 bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Update Password</h2>
                    <form method="POST" action="{{ route('dashboard') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current
                                Password</label>
                            <input type="password" name="current_password" id="current_password"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" name="password" id="password"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                                New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
                            @error('password_confirmation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-50 py-2 px-4 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
                            Update Password
                        </button>
                    </form>
                </div>

                <!-- Premium Subscription Card -->
                <div class="md:col-span-1 md:row-span-2 bg-white rounded-lg shadow p-6 flex flex-col">
                    <h2 class="text-xl font-bold mb-4">Premium Subscription</h2>
                    <p class="text-gray-700 mb-4">
                        Upgrade to premium to unlock exclusive features, including:
                    </p>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-2">
                        <li>Advanced Analytics</li>
                        <li>Personalized Insights</li>
                        <li>Priority Support</li>
                        <li>Exclusive Resources</li>
                    </ul>
                    <p class="text-gray-700 mb-6">
                        Enjoy a seamless learning experience and gain an edge with our premium tools.
                    </p>
                    <form method="POST" action="{{ route('dashboard') }}" class="mt-auto">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="w-full py-2 px-4 bg-yellow-500 text-white rounded-md shadow hover:bg-yellow-600 transition">
                            @if (auth()->user()->isPremium)
                                Cancel Premium
                            @else
                                Enable Premium
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-headerfooter>
