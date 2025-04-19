<x-headerfooter>
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold mb-8">{{ $userData->name }}'s Profile</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-8">
            <!-- Profile Information Card -->
            <div class="md:col-span-2 md:row-start-1 bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-bold mb-4">Profile Information
                    <span x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                        class="ml-2 h-5 w-5 cursor-pointer">
                        <!-- Tooltip Icon (a simple question mark SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div x-show="tooltip">
                            <p>The values present in the field, are your current details.</p>
                            <p>Update whatever field you'd like.</p>
                        </div>
                    </span>
                </h2>
                <form method="POST" action="/profile/update/{{ $userData->id }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" placeholder="{{ $userData->name }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="{{ $userData->email }}"
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
                <form method="POST" action="/profile/updatepass/{{ $userData->id }}">
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
            <div class="md:col-span-1 md:row-span-2 bg-white rounded-lg shadow p-10 flex flex-col">
                <h2 class="text-xl font-bold mb-4">Credits</h2>
                <p class="text-gray-700 mb-4">
                    Buy more credits, to continue taking on more tests:
                </p>
                <ul class="list-disc list-inside text-gray-700 mb-4 space-y-2">
                    <li>You currently have: {{$userData->credits}} credits remaining.</li>
                    <li>Generous offerings</li>
                    <li>Priority Support</li>
                    <li>No expiration of purchased credits</li>
                </ul>
                <p class="text-gray-700 mb-6">
                    Our credit system is made to be affordable, with the learner in mind. Get studying!
                </p>
                <a wire:navigate href="{{ route('checkoutshow') }}"
                    class="inline-block px-4 py-2 bg-green-500 text-white rounded-md shadow hover:bg-green-700 transition">
                    Buy Credits
                </a>
                <hr class="m-5"/>
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
                <a wire:navigate href="{{ route('checkoutshow') }}"
                    class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow hover:bg-blue-700 transition">
                    Coming soon!
                </a>
                {{-- <form method="POST" action="{{ route('dashboard') }}" class="mt-auto">
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
                </form> --}}
            </div>
        </div>
    </div>

</x-headerfooter>
