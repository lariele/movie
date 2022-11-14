<div class="col-span-12">
    <h1 class="text-lg font-medium truncate mt-4 mr-5">{{ $movie->name }}</h1>
    <div class="flex space-x-2 text-sm">
        <div>{{ $movie->data->duration }} min</div>
        <div>{{ $movie->categories->pluck('name')->join(', ') }}</div>
    </div>
</div>
<div class="col-span-12 grid grid-cols-8 py-4 border-b">
    <div class="col-span-1">
        {{--        <img src="{{ asset('storage/movies/posters/movie-'.($movie->id % 11 + 1).'.jpg') }}" title=""/>--}}
        @if(!empty($movie->getMedia('posters')->first()))
            <img src="{{ $movie->getMedia('posters')->first()->getUrl() }}"/>
        @endif
    </div>

    <div class="col-span-5 py-4 px-8 flex flex-col">
        <div class="text-md font-bold mb-1">
            {{ $movie->name }}
            <span
                class="ml-2 font-normal text-slate-600">{{ $movie->year }}</span></div>
        <div class="flex text-sm space-x-2 text-slate-600">
            @if(!empty($movie->data->duration))
                <div>{{ $movie->data->duration }} min</div>
            @endif
            <div>{{ $movie->categories->pluck('name')->join(', ') }}</div>
        </div>
        @if(!empty($movie->providers))
            <div class="text-sm mt-2 text-slate-600">
                @foreach($movie->providers->take(4) as $provider)
                    @if($provider->name == "Netflix")
                        <span
                            class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{$provider->name}}</span>
                    @elseif($provider->name == "HBO Max")
                        <span
                            class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{$provider->name}}</span>
                    @endif
                @endforeach
            </div>
        @endif
        <div class="mt-2 text-slate-500">
            {{ Str::limit($movie->description,190) }}
        </div>
        <div class="text-sm mt-2">
            @if($movie->on_netflix)
                <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Netflix</span>
            @endif
            @if($movie->on_hbo)
                <span class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">HBO</span>
            @endif
            @if($movie->on_disney)
                <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Disney</span>
            @endif
        </div>
        <div class="mt-auto">
            @if($movie->actress->isNotEmpty())
                <div class="text-slate-500 text-sm mb-1">
                    Stars
                    @foreach($movie->actress->skip(1)->take(3) as $actor)
                        <a class="@if(!$loop->last)line-delimited @endif text-blue-700 hover:text-blue-800"
                           href="">{{$actor->name}}</a>
                    @endforeach
                </div>
            @endif
            @if($movie->actress->isNotEmpty())
                <div class="text-slate-500 text-sm">
                    Directed by
                    @foreach($movie->actress->take(3) as $actor)
                        <a class="@if(!$loop->last)line-delimited @endif text-blue-700 hover:text-blue-800"
                           href="">{{$actor->name}}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="col-span-1 py-4 px-8 items-center text-center">
        <div class="flex items-center justify-center mt-1">
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg"><title>Rating</title>
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <p class="ml-2 text-sm font-bold text-gray-900">{{ $movie->rating/10 }}</p>
        </div>
    </div>
    <div class="col-span-1 py-4 items-center text-right">
        {{--            <button type="button"--}}
        {{--                    class="inline-flex items-center h-8 py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">--}}
        {{--                Watch Now--}}
        {{--            </button>--}}

        {{--        <button wire:click="toggleFavourite()" type="button"--}}
        {{--                class="inline-flex h-8 items-center @if(!$favourite) btn-def @else text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 @endif">--}}
        {{--            <svg aria-hidden="true" class="mr-2 -ml-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="20"--}}
        {{--                 height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"--}}
        {{--                 stroke-linecap="round" stroke-linejoin="round">--}}
        {{--                <line x1="12" y1="5" x2="12" y2="19"></line>--}}
        {{--                <line x1="5" y1="12" x2="19" y2="12"></line>--}}
        {{--            </svg>--}}
        {{--            Add to List--}}
        {{--        </button>--}}
    </div>
</div>
