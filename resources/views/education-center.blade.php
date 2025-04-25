<x-headerfooter>
    <main class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-4">Education Center</h1>
        <p class="text-gray-700 mb-10">Choose your AWS track and dive into our curated study materials.</p>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($tracks as $key => $label)
                <a href="{{ route('educationtrack', $key) }}"
                    class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-8 text-center">
                    <img src="{{ asset("images/{$key}-logo.png") }}" alt="{{ $label }}" class="mx-auto h-20 mb-4" />
                    <h2 class="text-2xl font-semibold mb-2">{{ $label }}</h2>
                    <p class="text-gray-600">
                        {{-- custom blurbs per track? --}}
                        @if ($key === 'aws-ccp')
                            Start here if you’re new to AWS—core concepts, quizzes & tips.
                        @elseif($key === 'aws-sa')
                            Deep dives, hands-on labs and mock tests for Architects.
                        @endif
                    </p>
                </a>
            @endforeach
        </div>
    </main>
</x-headerfooter>
