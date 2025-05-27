{{-- resources/views/admin/questions/create.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Add Question')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Add Question</h1>
    <form action="{{ route('admin.questions.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @include('admin.questions._form')
        <button class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
    </form>
@endsection
