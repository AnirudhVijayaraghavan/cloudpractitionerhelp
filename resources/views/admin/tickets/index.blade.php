@extends('admin.layouts.app')

@section('title', 'Support Tickets')

@section('content')
    <div x-data="{
        showModal: false,
        deleteUrl: null,
        openModal(url) { this.deleteUrl = url;
            this.showModal = true },
        closeModal() { this.showModal = false;
            this.deleteUrl = null }
    }">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Support Tickets</h1>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Subject</th>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Priority</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $t)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $t->id }}</td>
                            <td class="px-4 py-2">{{ $t->subject }}</td>
                            <td class="px-4 py-2">{{ $t->user->name }}</td>
                            <td class="px-4 py-2 capitalize">{{ $t->status }}</td>
                            <td class="px-4 py-2 capitalize">{{ $t->priority }}</td>
                            <td class="px-4 py-2">{{ $t->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.tickets.show', $t) }}"
                                    class="text-gray-700 hover:underline">View</a>
                                <button type="button" class="text-red-600 hover:underline"
                                    @click="openModal('{{ route('admin.tickets.destroy', $t) }}')">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $tickets->links() }}

        <form x-ref="deleteForm" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        {{-- And the same modal --}}
        <div x-show="showModal" x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-xl max-w-sm w-full" @click.away="closeModal()">
                <div class="p-6 text-center">
                    <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
                    <p class="mb-6 text-gray-600">Are you sure you want to delete this ticket?</p>
                    <div class="flex justify-center space-x-4">
                        <button type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                            @click="closeModal()">Cancel</button>
                        <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                            @click="$refs.deleteForm.action = deleteUrl; $refs.deleteForm.submit()">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
