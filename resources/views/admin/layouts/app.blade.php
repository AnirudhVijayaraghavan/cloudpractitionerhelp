<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Panel | @yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
{{-- Notification Container --}}
@if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="fixed top-17 right-0 z-50 transform transition-all duration-300 ease-out bg-green-500 text-white rounded-lg shadow-lg px-6 py-4">
        <div class="flex items-center">
            <div class="flex-1">
                {{ session('success') }}
            </div>
            <button @click="show = false" class="ml-4 text-2xl leading-none focus:outline-none">
                &times;
            </button>
        </div>
    </div>
@endif

@if (session()->has('failure'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="fixed top-17 right-0 z-50 transform transition-all duration-300 ease-out bg-red-500 text-white rounded-lg shadow-lg px-6 py-4">
        <div class="flex items-center">
            <div class="flex-1">
                {{ session('failure') }}
            </div>
            <button @click="show = false" class="ml-4 text-2xl leading-none focus:outline-none">
                &times;
            </button>
        </div>
    </div>
@endif

<body class="h-screen flex bg-gray-100 font-sans">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md hidden md:block">
        <div class="p-6 text-2xl font-bold text-blue-600">CPH Admin</div>
        <nav class="mt-6">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 @if (request()->routeIs('admin.dashboard')) bg-blue-100 font-semibold @endif">
                <x-heroicon-o-home class="w-5 h-5 mr-3" /> Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50">
                <x-heroicon-o-user-group class="w-5 h-5 mr-3" /> Users
            </a>
            <a href="{{ route('admin.questions.index') }}"
                class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50">
                <x-heroicon-o-question-mark-circle class="w-5 h-5 mr-3" /> Questions
            </a>
            <a href="{{ route('admin.quizzes.index') }}"
                class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50">
                <x-heroicon-o-clipboard-document-list class="w-5 h-5 mr-3" /> Quizzes
            </a>
            <a href="{{ route('admin.articles.index') }}"
                class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50">
                <x-heroicon-o-document-text class="w-5 h-5 mr-3" /> Articles
            </a>
            <a href="{{ route('admin.tickets.index') }}"
                class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50">
                <x-heroicon-o-ticket class="w-5 h-5 mr-3" /> Tickets
            </a>
            <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50">
                <x-heroicon-o-arrow-uturn-left class="w-5 h-5 mr-3" /> CPH Web-Application
            </a>
        </nav>
    </aside>

    {{-- Mobile nav --}}
    <div class="md:hidden bg-white shadow flex items-center justify-between px-4 py-3">
        <div class="text-xl font-bold text-blue-600">MyApp Admin</div>
        {{-- you’d put a hamburger here --}}
    </div>

    {{-- Main content --}}
    <div class="flex-1 overflow-y-auto">
        <header class="bg-white shadow p-6 flex items-center justify-between">
            <h1 class="text-2xl font-semibold">@yield('title', 'Dashboard')</h1>
            {{-- optional user menu / breadcrumbs --}}
        </header>
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
