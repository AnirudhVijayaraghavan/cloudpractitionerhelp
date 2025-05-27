{{-- resources/views/admin/users/index.blade.php --}}
@extends('admin.layouts.app')

@section('content')
    <div x-data="{
        showModal: false,
        deleteUrl: '',
        itemName: ''
    }" @keydown.escape.window="showModal = false">
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.users.edit', $user) }}"
                                class="text-blue-600 hover:underline mr-4">Edit</a>
                            <button
                                @click="
              deleteUrl = '{{ route('admin.users.destroy', $user) }}';
              itemName  = 'user &ldquo;{{ addslashes($user->name) }}&rdquo;';
              showModal  = true
            "
                                class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- DELETE CONFIRMATION MODAL -->
        <div x-show="showModal" x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="showModal = false" class="bg-white rounded-lg overflow-hidden shadow-xl w-11/12 max-w-md"
                x-trap.noscroll="showModal">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                    <p class="mb-6">
                        Are you sure you want to delete <span class="font-medium" x-text="itemName"></span>?
                    </p>
                    <div class="flex justify-end space-x-3">
                        <button @click="showModal = false"
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
                            Cancel
                        </button>

                        <form :action="deleteUrl" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
