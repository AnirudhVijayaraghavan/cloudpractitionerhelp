{{-- resources/views/admin/questions/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Questions')

@section('content')
    <div x-data="{
        showModal: false,
        deleteUrl: '',
        itemLabel: ''
    }" @keydown.escape.window="showModal = false">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Questions</h1>
            <a href="{{ route('admin.questions.create') }}"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                Add Question
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Text</th>
                        <th class="px-4 py-2 text-left">Options</th>
                        <th class="px-4 py-2 text-left">Answer</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($questions as $q)
                        <tr>
                            <td class="px-4 py-2">{{ $q->id }}</td>
                            <td class="px-4 py-2">{{ \Illuminate\Support\Str::limit($q->text, 50) }}</td>
                            <td class="px-4 py-2">{{ json_encode($q->options) }}</td>
                            <td class="px-4 py-2">{{ $q->correct_answer }}</td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="{{ route('admin.questions.edit', $q) }}" class="text-indigo-600 hover:underline">
                                    Edit
                                </a>
                                <button
                                    @click="
                            deleteUrl = '{{ route('admin.questions.destroy', $q) }}';
                            itemLabel = 'question #{{ $q->id }}';
                            showModal = true
                          "
                                    class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $questions->links() }}
        </div>

        {{-- DELETE CONFIRMATION MODAL --}}
        <div x-show="showModal" x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="showModal = false" x-trap.noscroll="showModal"
                class="bg-white rounded-lg overflow-hidden shadow-xl w-11/12 max-w-md">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                    <p class="mb-6">
                        Are you sure you want to delete <span class="font-medium" x-text="itemLabel"></span>?
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
