{{-- resources/views/admin/questions/_form.blade.php --}}
@csrf

<div class="space-y-4">
    <!-- Question Text -->
    <div>
        <label class="block text-sm font-medium">Question Text</label>
        <textarea name="text" rows="3"
            class="mt-1 block w-full border border-blue-300 rounded
                   focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('text', $question->text ?? '') }}</textarea>
        @error('text')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Options JSON -->
    <div>
        <label class="block text-sm font-medium">Options (JSON array)</label>
        <textarea name="options" rows="2"
            class="mt-1 block w-full border border-blue-300 rounded
                   focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('options', isset($question) ? json_encode($question->options) : '["Option A","Option B"]') }}</textarea>
        @error('options')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Correct Answer -->
    <div>
        <label class="block text-sm font-medium">Correct Answer</label>
        <input type="text" name="correct_answer" value="{{ old('correct_answer', $question->correct_answer ?? '') }}"
            class="mt-1 block w-full border border-blue-300 rounded
                   focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
        @error('correct_answer')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Explanation -->
    <div>
        <label class="block text-sm font-medium">Explanation</label>
        <textarea name="explanation" rows="2"
            class="mt-1 block w-full border border-blue-300 rounded
                   focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('explanation', $question->explanation ?? '') }}</textarea>
        @error('explanation')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
