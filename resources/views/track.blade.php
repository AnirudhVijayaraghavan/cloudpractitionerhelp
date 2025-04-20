<x-headerfooter>
    <main class="container mx-auto px-6 py-8">
        {{-- Hero --}}
        <h1 class="text-3xl font-bold mb-2">AWS Certified Cloud Practitioner (CLF‑C02)</h1>
        <p class="text-gray-700 mb-8">
            This track will guide you through all the essential topics for the AWS CCP exam, from core concepts to
            practice quizzes.
        </p>

        {{-- Articles Grid --}}
        @if ($articles->isEmpty())
            <p class="text-center text-gray-600">Coming soon! We’re assembling the best CCP materials for you.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($articles as $article)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col">
                        <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                        <p class="text-gray-600 mb-4 flex-1">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->body), 100) }}
                        </p>
                        <a href="{{ route('education.article', ['track' => $track, 'slug' => $article->slug]) }}"
                            class="mt-auto text-blue-600 hover:underline font-medium">
                            Read More →
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</x-headerfooter>
