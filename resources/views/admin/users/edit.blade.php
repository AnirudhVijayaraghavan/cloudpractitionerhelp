{{-- resources/views/admin/users/edit.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit User #{{ $user->id }}</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @method('PUT')
        @include('admin.users._form')
        <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded">Update</button>
    </form>
@endsection
