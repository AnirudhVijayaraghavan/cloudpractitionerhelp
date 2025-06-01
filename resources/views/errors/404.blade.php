<x-headerfooter>
    @section('maintitle', '404')
    <main class="flex-grow container bg-gray-50 flex items-center justify-center min-h-screen">
        <div class="text-center p-8 bg-white shadow-lg rounded-lg max-w-md">
            <h1 class="text-6xl font-bold text-indigo-600">404</h1>
            <h2 class="mt-4 text-2xl font-semibold text-gray-800">Oops! Page Not Found</h2>
            <p class="mt-2 text-gray-600">
                We can’t seem to find the page you’re looking for.
            </p>
            <div class="mt-6">
                <a href="{{ route('dashboard') }}"
                    class="inline-block px-6 py-3 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 transition">
                    Go Back Home
                </a>
            </div>
            <div class="mt-8 text-gray-400 text-sm">
                <p>
                    If you believe this is an error,
                    <a href="{{ route('supportcreate') }}" class="text-indigo-600 hover:underline">
                        let us know
                    </a>.
                </p>
            </div>
        </div>
    </main>
</x-headerfooter>
