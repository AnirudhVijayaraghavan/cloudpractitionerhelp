<x-headerfooter>
    <main class="flex-grow container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Education Center</h1>
        <p class="text-gray-700 mb-10">
            Choose your AWS track and dive into our hand‑picked study guides, tutorials, and practice quizzes.
        </p>

        <div class="grid gap-8 sm:grid-cols-2">
            <!-- AWS CCP Card -->
            <a href="{{ route('educationtrack', 'aws-ccp') }}"
                class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-8 text-center">
                <img src="{{ asset('images/aws-ccp-logo.png') }}" alt="AWS CCP" class="mx-auto h-20 mb-4" />
                <h2 class="text-2xl font-semibold mb-2">AWS Certified Cloud Practitioner (CLF‑C02)</h2>
                <p class="text-gray-600">
                    Start here if you’re new to AWS—get conceptual overviews, exam‑style quizzes, and essential tips.
                </p>
            </a>

            <!-- AWS Solutions Architect Card -->
            <a href="{{ route('educationtrack', 'aws-sa') }}"
                class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-8 text-center">
                <img src="{{ asset('images/aws-sa-logo.png') }}" alt="AWS Solutions Architect"
                    class="mx-auto h-20 mb-4" />
                <h2 class="text-2xl font-semibold mb-2">AWS Solutions Architect (SAA‑C02)</h2>
                <p class="text-gray-600">
                    Prepare for the Solutions Architect exam with deep‑dive guides, hands‑on labs, and mock tests.
                </p>
            </a>
        </div>
    </main>
</x-headerfooter>
