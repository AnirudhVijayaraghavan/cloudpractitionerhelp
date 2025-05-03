<x-headerfooter>
    <main class="flex-grow container mx-auto max-w-xl py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-center mb-8">Submit a Support Ticket</h1>

        <form action="{{ route('supportstore') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
            @csrf

            {{-- Subject --}}
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g. Need 10 more credits">
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Message --}}
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea name="message" id="message" rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Tell us why you need more credits…">{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-blue-400 text-white font-semibold rounded-md hover:bg-blue-500 transition">
                    <img src="{{asset('icons8-support-50.png')}}" class="text-white p-5h-6 w-6"/>
                    Send Ticket
                </button>
            </div>
        </form>
    </main>
</x-headerfooter>
