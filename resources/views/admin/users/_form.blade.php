{{-- resources/views/admin/users/_form.blade.php --}}
@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Name -->
    <div>
        <label class="block text-sm font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
            class="mt-1 block w-full border border-blue-300 rounded 
                      focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
            class="mt-1 block w-full border border-blue-300 rounded 
                      focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('email')
            {{-- <-- fixed --}}
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Premium -->
    <div>
        <label class="inline-flex items-center mt-6">
            <input type="hidden" name="isPremium" value="0" />
            <input type="checkbox" name="isPremium" value="1"
                {{ old('isPremium', $user->isPremium ?? false) ? 'checked' : '' }}
                class="form-checkbox text-blue-600 border border-blue-300 focus:ring-blue-200">
            <span class="ml-2">Premium</span>
        </label>
        @error('isPremium')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Admin -->
    <div>
        <label class="inline-flex items-center mt-6">
            <input type="hidden" name="isAdmin" value="0" />
            <input type="checkbox" name="isAdmin" value="1"
                {{ old('isAdmin', $user->isAdmin ?? false) ? 'checked' : '' }}
                class="form-checkbox text-blue-600 border border-blue-300 focus:ring-blue-200">
            <span class="ml-2">Admin</span>
        </label>
        @error('isAdmin')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Credits -->
    <div>
        <label class="block text-sm font-medium">Credits</label>
        <input type="number" name="credits" value="{{ old('credits', $user->credits ?? 0) }}"
            class="mt-1 block w-full border border-blue-300 rounded 
                      focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('credits')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label class="block text-sm font-medium">
            Password
            @if (isset($user))
                <span class="text-xs">(leave blank to keep)</span>
            @endif
        </label>
        <input type="password" name="password"
            class="mt-1 block w-full border border-blue-300 rounded 
                      focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
            {{ isset($user) ? '' : 'required' }}>
        @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
