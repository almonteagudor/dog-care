<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $id }}">{{ $label }}</label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
        @error($name) border-2 border-red-600 @enderror"
        id="{{ $id }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        type="text"
        value="{{ $value }}"
    />
    @error($name)
    <div class="flex items-center text-red-600 font-medium text-sm mt-1">
        <svg class="w-5 h-5 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        <span class="text-red-700">{{ $message }}</span>
    </div>
    @enderror
</div>

