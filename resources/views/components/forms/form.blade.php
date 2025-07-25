<form method="{{ $method }}" action="{{ $action }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf

    {{ $slot }}

    <div class="flex items-center justify-between">
        <button
            class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
        >
            {{ $buttonLabel }}
        </button>
    </div>
</form>
