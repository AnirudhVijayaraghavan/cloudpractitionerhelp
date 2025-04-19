<x-headerfooter>
    <main class="max-w-md mx-auto py-10 text-center">
        <h1 class="text-2xl font-bold text-green-600">Payment Successful!</h1>
        <p class="mt-4">You’ve been credited with {{$credits}} quiz attempts.</p>
        <a href="{{ route('dashboard') }}" class="text-blue-600">Return to Dashboard</a>
    </main>
</x-headerfooter>
