<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Education Center</h1>
        <p class="text-gray-700 mb-6">
            Explore our curated study materials, tutorials, and guides for the AWS CCP CLF-C03 exam.
        </p>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            {{-- @foreach ($articles as $article)
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-xl transition">
                    <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $article->excerpt ?? Str::limit($article->body, 100) }}</p>
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">
                        Read More
                    </a>
                </div>
            @endforeach --}}
        </div>
    </main>
</x-headerfooter>
