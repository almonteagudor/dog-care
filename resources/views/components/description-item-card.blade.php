<div class="max-w-sm rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col h-full bg-white border border-gray-200">
    <div class="px-6 py-4 flex-grow">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-bold text-xl text-gray-800">{{ $name }}</h3>
{{--            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $category ?? 'General' }}</span>--}}
        </div>
        <p class="text-gray-600 text-base leading-relaxed">
            {{ $description }}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2 flex items-center justify-between border-t border-gray-100">
        <div class="flex items-center text-sm text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ $createdAt }}</span>
        </div>
        <div class="flex gap-3">
            <a href="{{ $editUrl }}"
               class="flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200"
               title="{{ __('messages.edit') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>
            <form action="{{ $deleteUrl }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('{{__('messages.are_you_sure_you_want_to_delete_this_disease_?')}}')"
                        class="flex items-center text-red-600 hover:text-red-800 transition-colors duration-200 cursor-pointer"
                        title="{{ __('messages.delete') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
