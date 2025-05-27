{{-- resources/views/admin/articles/create.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Add Article')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Add Article</h1>
    <form action="{{ route('admin.articles.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @include('admin.articles._form')
        <button class="px-4 py-2 bg-yellow-500 text-white rounded">Save</button>
    </form>
@endsection
