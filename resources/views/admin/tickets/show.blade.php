{{-- resources/views/admin/tickets/show.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Ticket Details')

@section('content')
    <div class="space-y-6" x-data="{ confirmClose: false }">
        <h1 class="text-2xl font-bold">Ticket #{{ $ticket->id }}</h1>

        <div class="bg-white p-6 rounded-lg shadow space-y-4">
            <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
            <p><strong>From:</strong> {{ $ticket->user->name }} ({{ $ticket->email }})</p>
            <p><strong>Status:</strong> <span class="capitalize">{{ $ticket->status }}</span></p>
            <p><strong>Priority:</strong> <span class="capitalize">{{ $ticket->priority }}</span></p>
            <p><strong>Created:</strong> {{ $ticket->created_at->toDayDateTimeString() }}</p>
            <hr class="border-gray-200">
            <h2 class="font-semibold">Message</h2>
            <p class="whitespace-pre-wrap">{{ $ticket->message }}</p>
        </div>

        {{-- Inline forms for Status & Priority --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}"
                class="bg-white p-4 rounded-lg shadow space-y-2">
                @csrf @method('PUT')
                <label for="status" class="block text-sm font-medium">Status</label>
                <select name="status" id="status"
                    class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="open" @selected($ticket->status === 'open')>Open</option>
                    <option value="pending" @selected($ticket->status === 'pending')>Pending</option>
                    <option value="closed" @selected($ticket->status === 'closed')>Closed</option>
                </select>
                <button type="submit"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition">
                    Update Status
                </button>
            </form>

            <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}"
                class="bg-white p-4 rounded-lg shadow space-y-2">
                @csrf @method('PUT')
                <label for="priority" class="block text-sm font-medium">Priority</label>
                <select name="priority" id="priority"
                    class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="low" @selected($ticket->priority === 'low')>Low</option>
                    <option value="normal" @selected($ticket->priority === 'normal')>Normal</option>
                    <option value="high" @selected($ticket->priority === 'high')>High</option>
                </select>
                <button type="submit"
                    class="mt-2 px-4 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600 transition">
                    Update Priority
                </button>
            </form>
        </div>

        {{-- “Mark as Closed” button + modal --}}
        @if ($ticket->status !== 'closed')
            <div>
                <button @click="confirmClose = true"
                    class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition">
                    Mark as Closed
                </button>
            </div>

            <div x-show="confirmClose" x-cloak
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
                <div @click.away="confirmClose = false" class="bg-white rounded-lg shadow-xl max-w-sm w-full p-6 space-y-4">
                    <h2 class="text-lg font-semibold">Are you sure?</h2>
                    <p>This will mark this ticket as closed.</p>
                    <div class="flex justify-end space-x-3 mt-4">
                        <button @click="confirmClose = false"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                            Cancel
                        </button>
                        <form method="POST" action="{{ route('admin.tickets.update', $ticket) }}">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="closed">
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Yes, Close
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
