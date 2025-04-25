<x-headerfooter>
    <main class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-2">{{ $trackName }}</h1>
        <p class="text-gray-700 mb-8">
            Explore all materials for the {{ $trackName }} track.
        </p>

        @if ($articles->isEmpty())
            <p class="text-center text-gray-600">Coming soon! We’re adding content.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($articles as $article)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
                        <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                        <p class="text-gray-600 mb-4 flex-1">
                            {{ $article->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($article->body), 100) }}
                        </p>
                        <a href="{{ route('educationarticle', ['track' => $track, 'article' => $article->slug]) }}"
                            class="mt-auto text-blue-600 hover:underline font-medium">
                            Read More →
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</x-headerfooter>
