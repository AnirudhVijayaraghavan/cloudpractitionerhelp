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

            {{-- Email (readonly + hidden) --}}
            <div>
                <label for="email_display" class="block text-sm font-medium text-gray-700">Your Email</label>
                <input type="email" id="email_display" value="{{ auth()->user()->email }}"
                    class="mt-1 block w-full border-gray-300 bg-gray-100 rounded-md shadow-sm" readonly>
                {{-- still send it --}}
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
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
                    <img src="{{ asset('icons8-support-50.png') }}" class="h-6 w-6 mr-2" alt="support icon" />
                    Send Ticket
                </button>
            </div>
        </form>
    </main>
</x-headerfooter>
