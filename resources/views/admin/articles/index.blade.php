@extends('admin.layouts.app')

@section('title', 'Articles')

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
            <h1 class="text-2xl font-bold">Articles</h1>
            <a href="{{ route('admin.articles.create') }}"
                class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                Add Article
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Track</th>
                        <th class="px-4 py-2">Order</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $a)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $a->id }}</td>
                            <td class="px-4 py-2">{{ $a->title }}</td>
                            <td class="px-4 py-2">{{ $a->track }}</td>
                            <td class="px-4 py-2">{{ $a->order }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('admin.articles.edit', $a) }}"
                                    class="text-indigo-600 hover:underline">Edit</a>
                                <button type="button" class="text-red-600 hover:underline"
                                    @click="openModal('{{ route('admin.articles.destroy', $a) }}')">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $articles->links() }}

        {{-- Hidden delete form --}}
        <form x-ref="deleteForm" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        {{-- Modal --}}
        <div x-show="showModal" x-transition.opacity
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-sm w-full" @click.away="closeModal()">
                <div class="p-6 text-center">
                    <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
                    <p class="mb-6 text-gray-600">Are you sure you want to delete this article?</p>
                    <div class="flex justify-center space-x-4">
                        <button type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                            @click="closeModal()">
                            Cancel
                        </button>
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
