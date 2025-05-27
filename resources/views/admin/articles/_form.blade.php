@csrf

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium">Title</label>
        <input type="text" name="title" value="{{ old('title', $article->title ?? '') }}" required
            class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Track</label>
        <input type="text" name="track" value="{{ old('track', $article->track ?? '') }}" required
            class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('track')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $article->slug ?? '') }}" required
            class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        @error('slug')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Excerpt</label>
        <textarea name="excerpt" rows="2"
            class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Body</label>
        <textarea name="body" rows="5"
            class="mt-1 block w-full border border-blue-300 rounded focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('body', $article->body ?? '') }}</textarea>
        @error('body')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
