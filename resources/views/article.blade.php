<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-8 max-w-6xl">
        {{-- Breadcrumbs --}}
        <nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
            <ol class="list-reset flex">
                <li>
                    <a href="{{ route('educationsection') }}" class="hover:underline">Education Center</a>
                </li>
                <li><span class="mx-2">/</span></li>
                <li>
                    <a href="{{ route('educationtrack', $track) }}" class="hover:underline">
                        {{ $trackName }}
                    </a>
                </li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-700">{{ Str::limit($article->title, 30) }}</li>
            </ol>
        </nav>

        {{-- Article Header --}}
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden mb-8">
            <div class="px-10 py-8 border-b border-gray-200">
                <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $article->title }}</h1>
                <div class="mt-3 flex flex-wrap items-center text-sm text-gray-600 space-x-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M6 2a1 1 0 011 1v1h6V3a1 1 0 112 0v1h1a2 2 0 012 2v2H3V6a2 2 0 012-2h1V3a1 1 0 011-1zM3 10h14v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6z" />
                        </svg>
                        {{ $article->created_at->format('M d, Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 3a1 1 0 00-.894.553L7.382 6H4a1 1 0 000 2h3.382l1.724 2.447A1 1 0 0010 10a1 1 0 00.894-.553L12.618 8H16a1 1 0 100-2h-3.382l-1.724-2.447A1 1 0 0010 3z" />
                        </svg>
                        Admin
                    </div>
                </div>
                @if ($article->excerpt)
                    <p class="text-gray-700 mt-5 text-lg">{{ $article->excerpt }}</p>
                @endif
            </div>

            <div class="px-10 py-8">
                {{-- Table of Contents --}}
                @if (Str::contains($contentHtml, '<h2'))
                    <nav class="mb-8 bg-gray-50 p-6 rounded-lg">
                        <p class="text-sm font-semibold text-gray-600 mb-3">On this page</p>
                        <ul class="list-disc list-inside text-gray-600 text-sm space-y-2">
                            {{-- Dynamically generated TOC --}}
                        </ul>
                    </nav>
                @endif

                {{-- Article Content --}}
                <div class="prose prose-xl prose-gray max-w-none">
                    {!! $contentHtml !!}
                </div>
            </div>
        </div>

        {{-- Back to track button --}}
        <div class="text-center mt-8">
            <a href="{{ route('educationtrack', $track) }}"
                class="inline-flex items-center text-blue-600 hover:underline font-medium text-lg">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to {{ $trackName }}
            </a>
        </div>
    </main>
</x-headerfooter>
