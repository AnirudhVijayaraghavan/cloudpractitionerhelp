<x-headerfooter>
    <main class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-center mb-10">Buy Quiz Credits</h1>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @php
                $plans = [
                    ['credits' => 2, 'amount' => 100, 'label' => '$1 for 2 credits'],
                    ['credits' => 5, 'amount' => 200, 'label' => '$2 for 5 credits'],
                    ['credits' => 10, 'amount' => 400, 'label' => '$4 for 10 credits'],
                    ['credits' => 20, 'amount' => 1000, 'label' => '$10 for 20 credits'],
                ];
            @endphp

            @foreach ($plans as $plan)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <div class="p-6 flex-1">
                        <div class="text-center">
                            <span class="block text-5xl font-bold">{{ $plan['credits'] }}</span>
                            <span class="block text-gray-500 mt-2">Quiz Credits</span>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-6">
                        <div class="flex items-baseline justify-center mb-4">
                            <span class="text-3xl font-extrabold">${{ $plan['amount'] / 100 }}</span>
                        </div>
                        <form action="{{ route('checkoutprocess') }}" method="POST">
                            @csrf
                            <input type="hidden" name="credits" value="{{ $plan['credits'] }}">
                            <input type="hidden" name="amount" value="{{ $plan['amount'] }}">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                                {{ $plan['label'] }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-headerfooter>
