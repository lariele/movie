<div class="grid grid-cols-12 gap-4 text-sm">
    <div class="col-span-11 gap-4 flex items-center flex flex-col sm:flex-row">
        <div class="mr-2">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="filter.search" type="text" id="table-search"
                       class="block p-2 pl-10 w-64 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Search Orders, Customers...">
            </div>
        </div>

        <div class="mr-2">
            <div>
                <button id="dropdownFilterDividerButton" data-dropdown-toggle="dropdownFilterDivider"
                        class="w-32 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Show only
                    <svg class="ml-auto w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div wire:ignore id="dropdownFilterDivider"
                     class="hidden mt-3 z-10 w-32 bg-white rounded shadow dark:bg-gray-700">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownFilterDividerButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input wire:model="filter.is.new" id="checkbox-show-new" type="checkbox" value="1"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-show-new"
                                       class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">New</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input wire:model="filter.is.processing" id="checkbox-show-processing" type="checkbox"
                                       value="1"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-show-processing"
                                       class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Processing</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input wire:model="filter.is.completed" id="checkbox-show-completed" type="checkbox"
                                       value="1"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-show-completed"
                                       class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Completed</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input wire:model="filter.is.canceled" id="checkbox-show-canceled" type="checkbox"
                                       value="1"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-show-canceled"
                                       class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Canceled</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input wire:model="filter.is.deleted" id="checkbox-show-deleted" type="checkbox"
                                       value="1"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-show-deleted"
                                       class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Deleted</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex items-center mr-4">
            <input wire:model="filter.has_provider.netflix" id="on_netflix" type="checkbox" value="1"
                   class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 focus:ring-2">
            <label for="on_netflix" class="ml-2 text-sm font-medium text-gray-900">Netflix</label>
        </div>
        <div class="flex items-center mr-4">
            <input wire:model="filter.has_provider.hbo" id="on_hbo" type="checkbox" value="1"
                   class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 focus:ring-2">
            <label for="on_hbo" class="ml-2 text-sm font-medium text-gray-900">HBO</label>
        </div>
        <div class="flex items-center mr-4">
            <input wire:model="filter.on_disney" id="on_disney" type="checkbox" value="1"
                   class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
            <label for="on_disney" class="ml-2 text-sm font-medium text-gray-900">Disney</label>
        </div>

        <div class="flex self-center sm:mr-2 ml-8">
            <label class="font-medium">Year</label>
        </div>
        <input wire:model="filter.year_from" type="text"
               class="mr-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="From">
        <input wire:model="filter.year_to" type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="To">


    </div>
    <div class="col-span-1 flex items-center justify-end">
        <div wire:click="filterViewList()"
             class="mr-4 @if(isset($row) && $row == 'list') text-gray-900 @else text-gray-500 hover:text-gray-900 @endif">
            <x-movie::ui.movie-list-filter.icon-list/>
        </div>
        <div wire:click="filterViewBoxed()"
             class="@if(isset($row) && $row == 'boxed') text-gray-900 @else text-gray-500 hover:text-gray-900 @endif">
            <x-movie::ui.movie-list-filter.icon-boxed/>
        </div>
    </div>
</div>

{{--<div class="grid grid-cols-12 gap-4 mt-4 h-8">--}}

{{--    @include('order::components.list.filter-search')--}}

{{--    <div class="col-span-6 gap-4 flex items-center flex flex-col sm:flex-row">--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.on_netflix" id="on_netflix" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 focus:ring-2">--}}
{{--            <label for="on_netflix" class="ml-2 text-sm font-medium text-gray-900">Netflix</label>--}}
{{--        </div>--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.on_hbo" id="on_hbo" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 focus:ring-2">--}}
{{--            <label for="on_hbo" class="ml-2 text-sm font-medium text-gray-900">HBO</label>--}}
{{--        </div>--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.on_disney" id="on_disney" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">--}}
{{--            <label for="on_disney" class="ml-2 text-sm font-medium text-gray-900">Disney</label>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="col-span-12 flex items-center justify-end">--}}
{{--        <div wire:click="filterViewList()"--}}
{{--             class="mr-4 @if(isset($row) && $row == 'list') text-gray-900 @else text-gray-500 hover:text-gray-900 @endif">--}}
{{--            <x-movie::ui.movie-list-filter.icon-list/>--}}
{{--        </div>--}}
{{--        <div wire:click="filterViewBoxed()"--}}
{{--             class="@if(isset($row) && $row == 'boxed') text-gray-900 @else text-gray-500 hover:text-gray-900 @endif">--}}
{{--            <x-movie::ui.movie-list-filter.icon-boxed/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
