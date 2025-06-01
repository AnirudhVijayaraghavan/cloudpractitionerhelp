<x-headerfooter>
    @section('maintitle', 'Profile')
    <div class="container mx-auto px-6 py-10 space-y-8">
        {{-- Banner + Avatar --}}
        <div class="relative bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg h-40 overflow-visible">
            
            <div class="absolute -bottom-12 text-center">

                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random"
                    class="w-24 h-24 rounded-full border-4 border-white shadow-lg object-cover" />
            </div>
        </div>
        <div class="pt-10 text-center">
            <h1 class="text-3xl font-bold text-gray-800">{{ $userData->name }}</h1>
            <p class="text-gray-600">Joined {{ $userData->created_at->format('M Y') }}</p>
        </div>

        {{-- Tabs --}}
        <div x-data="{ tab: 'profile' }" class="bg-white rounded-lg shadow">
            <nav class="flex space-x-4 border-b">
                <button @click="tab='profile'"
                    :class="tab === 'profile' ? 'border-blue-600 text-blue-600' : 'text-gray-600 hover:text-gray-800'"
                    class="px-6 py-3 border-b-2 font-medium">
                    Profile
                </button>
                <button @click="tab='security'"
                    :class="tab === 'security' ? 'border-blue-600 text-blue-600' : 'text-gray-600 hover:text-gray-800'"
                    class="px-6 py-3 border-b-2 font-medium">
                    Security
                </button>
                <button @click="tab='billing'"
                    :class="tab === 'billing' ? 'border-blue-600 text-blue-600' : 'text-gray-600 hover:text-gray-800'"
                    class="px-6 py-3 border-b-2 font-medium">
                    Credits & Billing
                </button>
            </nav>

            {{-- Tab Panels --}}
            <div class="p-8 space-y-6">

                {{-- PROFILE TAB PANEL --}}
                <div x-show="tab==='profile'" class="space-y-6">

                    <h2 class="text-xl font-semibold">Personal Information</h2>

                    <form method="POST" action="/profile/update/{{ $userData->id }}" class="space-y-4 max-w-md">
                        @csrf @method('PUT')

                        {{-- Name --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" name="name" type="text"
                                value="{{ old('name', $userData->name) }}" @disabled($userData->isOAuth)
                                @readonly($userData->isOAuth)
                                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500
                              {{ $userData->isOAuth ? 'bg-gray-100 cursor-not-allowed' : 'bg-gray-50' }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email"
                                value="{{ old('email', $userData->email) }}" @disabled($userData->isOAuth)
                                @readonly($userData->isOAuth)
                                class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500
                              {{ $userData->isOAuth ? 'bg-gray-100 cursor-not-allowed' : 'bg-gray-50' }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit or notice --}}
                        @if (!$userData->isOAuth)
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Save Changes
                            </button>
                        @else
                            <p class="text-sm text-red-600">
                                Your profile is managed via GitHub OAuth; changes must be made on GitHub.
                            </p>
                        @endif

                    </form>
                </div>

                {{-- SECURITY TAB --}}
                <div x-show="tab==='security'">
                    <h2 class="text-xl font-semibold mb-4">Security Settings</h2>

                    @if ($userData->isOAuth)
                        <div class="p-4 bg-yellow-50 text-yellow-800 rounded-md">
                            Your account is managed via GitHub OAuth. To change your password or two-factor settings,
                            please visit
                            <a href="https://github.com/settings/security" target="_blank"
                                class="underline text-blue-600">
                                GitHub Security Settings
                            </a>.
                        </div>
                    @else
                        <form method="POST" action="/profile/updatepass/{{ $userData->id }}"
                            class="space-y-4 max-w-md">
                            @csrf @method('PUT')

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Current Password</label>
                                <input name="current_password" type="password" required
                                    class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" />
                                @error('current_password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">New Password</label>
                                <input name="password" type="password" required
                                    class="mt-1 block w-full px-4 py-2 border rounded-md" />
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                <input name="password_confirmation" type="password" required
                                    class="mt-1 block w-full px-4 py-2 border rounded-md" />
                            </div>

                            <div class="text-left">
                                <button type="submit"
                                    class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    @endif
                </div>

                {{-- BILLING TAB --}}
                <div x-show="tab==='billing'">
                    <h2 class="text-xl font-semibold mb-4">Credits & Billing</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Credits Card --}}
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 mb-2">Remaining Credits</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $userData->credits }}</p>
                            <a href="{{ route('checkoutshow') }}"
                                class="mt-4 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                Buy More Credits
                            </a>
                        </div>

                        {{-- Subscription Card --}}
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 mb-2">Premium Subscription</p>
                            <p class="text-lg font-medium text-gray-800">
                                {{ $userData->isPremium ? 'Active' : 'Not Subscribed' }}
                            </p>
                            <a href="{{ route('checkoutshow') }}"
                                class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                {{ $userData->isPremium ? 'Manage Subscription' : 'Subscribe to Premium' }}
                            </a>
                        </div>
                    </div>

                    {{-- Recent Activity
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-2">Recent Quiz Attempts</h3>
                        <ul class="space-y-3">
                            @foreach (auth()->user()->quizzes()->latest()->limit(5)->get() as $quiz)
                                <li class="flex justify-between bg-gray-50 p-4 rounded-md hover:bg-gray-100">
                                    <div>
                                        <span class="font-medium">{{ $quiz->created_at->format('M d, Y') }}</span>
                                        — Score: <span class="text-blue-600">{{ $quiz->score }}%</span>
                                    </div>
                                    <a href="{{ route('quizdetailindividual', ['id' => auth()->user()->id, 'quizID' => $quiz->id]) }}"
                                        class="text-blue-600 hover:underline">View</a>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</x-headerfooter>
