<div class="col-span-{{$colSpan ?? 2}} grid grid-cols-12 py-4">
    <div class="col-span-12">
        <a href="{{ route('movie', ['movie' => $movie->id, 'movieSlug' => Str::slug($movie->name)]) }}">
            @if(!empty($movie->getMedia('posters')->first()))
                <img src="{{ $movie->getMedia('posters')->first()->getUrl() }}"/>
            @endif
        </a>

        <div class="whitespace-nowrap overflow-hidden text-sm font-semibold py-2 px-2">
            <a href="{{ route('movie', ['movie' => $movie->id, 'movieSlug' => Str::slug($movie->name)]) }}">{{ $movie->name }}</a>
        </div>
    </div>
    {{--    <div class="col-span-12 text-md font-semibold py-4 px-2">--}}
    {{--        <a href="{{ route('movie', ['movie' => $movie->id, 'movieSlug' => Str::slug($movie->name)]) }}">{{ $movie->name }}</a>--}}
    {{--    --}}
    {{--    </div>--}}
    @if(isset($showRating) && $showRating === true)
        <div class="col-span-12 px-2 flex items-start">
            <div class="text-xs">{{ $movie->categories->take(3)->pluck('name')->join(' ') }}</div>
            <div class="flex items-center ml-auto">
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg"><title>Rating star</title>
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <p class="ml-2 text-sm font-bold text-gray-900">{{ round($movie->rating, 1) }}</p>
            </div>
        </div>
    @endif
</div>
