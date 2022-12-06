{{--<div class="grid grid-cols-12 gap-4 text-sm">--}}
{{--    <div class="col-span-11 gap-4 flex items-center flex flex-col sm:flex-row">--}}
{{--        <div class="flex self-center sm:mr-2">--}}
{{--            <label class="font-medium">Watch on</label>--}}
{{--        </div>--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.has_provider.netflix" id="on_netflix" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 focus:ring-2">--}}
{{--            <label for="on_netflix" class="ml-2 text-sm font-medium text-gray-900">Netflix</label>--}}
{{--        </div>--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.has_provider.hbo" id="on_hbo" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 focus:ring-2">--}}
{{--            <label for="on_hbo" class="ml-2 text-sm font-medium text-gray-900">HBO</label>--}}
{{--        </div>--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.has_provider.disney" id="on_disney" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">--}}
{{--            <label for="on_disney" class="ml-2 text-sm font-medium text-gray-900">Disney</label>--}}
{{--        </div>--}}
{{--        <div class="flex items-center mr-4">--}}
{{--            <input wire:model="filter.has_provider.amazon" id="on_amazon" type="checkbox" value="1"--}}
{{--                   class="w-4 h-4 text-yellow-400 bg-gray-100 rounded border-gray-300 focus:ring-yellow-50 focus:ring-2">--}}
{{--            <label for="on_amazon" class="ml-2 text-sm font-medium text-gray-900">Amazon</label>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="grid grid-cols-12 gap-4 text-sm mb-4">
    <div class="col-span-10 gap-4 flex items-center flex flex-col sm:flex-row">
        @include('movie::components.list.movie-list-filter-categories')

        @include('movie::components.list.movie-list-filter-tags')

        <input wire:model.debounce.500ms="yearFrom" type="text"
               class="mr-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="Year From">
        <input wire:model.debounce.500ms="yearTo" type="text"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-24 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="To">


        {{--        <div class="flex self-center ml-6 sm:mr-2">--}}
        {{--            <label class="font-medium">Watch on</label>--}}
        {{--        </div>--}}
        {{--        <div class="flex items-center mr-4">--}}
        {{--            <input wire:model="filter.has_provider.netflix" id="on_netflix" type="checkbox" value="1"--}}
        {{--                   class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 focus:ring-2">--}}
        {{--            <label for="on_netflix" class="ml-2 text-sm font-medium text-gray-900">Netflix</label>--}}
        {{--        </div>--}}
        {{--        <div class="flex items-center mr-4">--}}
        {{--            <input wire:model="filter.has_provider.hbo" id="on_hbo" type="checkbox" value="1"--}}
        {{--                   class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 focus:ring-2">--}}
        {{--            <label for="on_hbo" class="ml-2 text-sm font-medium text-gray-900">HBO</label>--}}
        {{--        </div>--}}
        {{--        <div class="flex items-center mr-4">--}}
        {{--            <input wire:model="filter.has_provider.disney" id="on_disney" type="checkbox" value="1"--}}
        {{--                   class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">--}}
        {{--            <label for="on_disney" class="ml-2 text-sm font-medium text-gray-900">Disney</label>--}}
        {{--        </div>--}}
        {{--        <div class="flex items-center mr-4">--}}
        {{--            <input wire:model="filter.has_provider.amazon" id="on_amazon" type="checkbox" value="1"--}}
        {{--                   class="w-4 h-4 text-yellow-400 bg-gray-100 rounded border-gray-300 focus:ring-yellow-50 focus:ring-2">--}}
        {{--            <label for="on_amazon" class="ml-2 text-sm font-medium text-gray-900">Amazon</label>--}}
        {{--        </div>--}}

    </div>
    <div class="col-span-1 gap-4 flex items-center flex flex-col sm:flex-row">

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

<div class="grid grid-cols-12 gap-4 text-sm mb-2">
    <div class="col-span-11 gap-4 flex items-center flex flex-col sm:flex-row">
        <div class="flex self-center sm:mr-2">
            <label class="font-medium">Watch on</label>
        </div>
        <div class="flex items-center mr-4">
            <input wire:model="providers.netflix" id="on_netflix" type="checkbox" value="1"
                   class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 focus:ring-2">
            <label for="on_netflix" class="ml-2 text-sm font-medium text-gray-900">Netflix</label>
        </div>
        <div class="flex items-center mr-4">
            <input wire:model="providers.hbo" id="on_hbo" type="checkbox" value="1"
                   class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 focus:ring-2">
            <label for="on_hbo" class="ml-2 text-sm font-medium text-gray-900">HBO</label>
        </div>
        <div class="flex items-center mr-4">
            <input wire:model="providers.disney" id="on_disney" type="checkbox" value="1"
                   class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 focus:ring-2">
            <label for="on_disney" class="ml-2 text-sm font-medium text-gray-900">Disney</label>
        </div>
        <div class="flex items-center mr-4">
            <input wire:model="providers.amazon" id="on_amazon" type="checkbox" value="1"
                   class="w-4 h-4 text-yellow-400 bg-gray-100 rounded border-gray-300 focus:ring-yellow-50 focus:ring-2">
            <label for="on_amazon" class="ml-2 text-sm font-medium text-gray-900">Amazon</label>
        </div>
    </div>
</div>
