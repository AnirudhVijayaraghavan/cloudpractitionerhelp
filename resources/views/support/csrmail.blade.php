<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="bg-blue-600 text-white p-6 text-center">
        <h1 class="text-2xl font-bold">New Support Ticket</h1>
    </div>

    <div class="p-6 space-y-4">
        <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
        <p><strong>From:</strong> {{ $ticket->email }}</p>
        <p><strong>Submitted At:</strong>
            {{ $ticket->created_at->toDayDateTimeString() }}
        </p>

        <hr class="border-gray-300">

        <h2 class="font-semibold">Message:</h2>
        <p class="whitespace-pre-wrap">{{ $ticket->message }}</p>
    </div>

    <div class="bg-gray-100 text-center p-4 text-sm text-gray-600">
        © {{ date('Y') }} Your Company. All rights reserved.
    </div>
</div>
