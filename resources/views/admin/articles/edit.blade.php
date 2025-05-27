{{-- resources/views/admin/articles/edit.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Edit Article')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit #{{ $article->id }}</h1>
    <form action="{{ route('admin.articles.update', $article) }}" method="POST"
        class="space-y-6 bg-white p-6 rounded-lg shadow">
        @method('PUT')
        @include('admin.articles._form')
        <button class="px-4 py-2 bg-indigo-500 text-white rounded">Update</button>
    </form>
@endsection
