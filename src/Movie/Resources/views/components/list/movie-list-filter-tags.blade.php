<div class="mr-2">
    <div>
        <button id="tagFilterButton" data-dropdown-toggle="tagFilter"
                class="w-40 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Keywords
            <svg class="ml-auto w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div wire:ignore id="tagFilter"
             class="hidden mt-3 z-10 w-40 bg-white rounded shadow dark:bg-gray-700">
            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="tagFilterButton">
                @foreach($tags as $tag)
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input wire:model="keywords.{{$tag->id}}"
                                   id="tag-filter-{{$tag->id}}"
                                   type="checkbox"
                                   value="{{$tag->id}}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="tag-filter-{{$tag->id}}"
                                   class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$tag->name}}</label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
