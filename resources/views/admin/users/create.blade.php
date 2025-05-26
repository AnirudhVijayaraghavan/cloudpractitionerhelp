{{-- resources/views/admin/users/create.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Add User')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Add User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
        @include('admin.users._form')
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
    </form>
@endsection
