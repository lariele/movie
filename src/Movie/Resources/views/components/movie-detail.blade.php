@section('title')
    {{ $movie->name }} ({{ $movie->year }})
@endsection
<div class="col-span-12">
    <h1 class="text-lg font-medium truncate mt-4 mr-5">{{ $movie->name }} <span
            class="ml-2 font-normal text-slate-600">{{ $movie->year }}</span></h1>
    <div class="flex space-x-2 text-sm">
        <div>{{ $movie->data->duration }} min</div>
        <div>{{ $movie->categories->pluck('name')->join(', ') }}</div>
        <div>{{ $movie->countries->pluck('name')->join(', ') }}</div>
    </div>
</div>
<div class="col-span-12 grid grid-cols-8 py-4 border-b">
    <div class="col-span-1">
        @if(!empty($movie->getMedia('posters')->first()))
            <img src="{{ $movie->getMedia('posters')->first()->getUrl() }}"/>
        @endif
    </div>

    <div class="col-span-5 py-4 px-8 flex flex-col">
        {{--        <div class="text-md font-bold mb-1">--}}
        {{--            {{ $movie->name }}--}}
        {{--            <span--}}
        {{--                class="ml-2 font-normal text-slate-600">{{ $movie->year }}</span></div>--}}
        {{--        <div class="flex text-sm space-x-2 text-slate-600">--}}
        {{--            @if(!empty($movie->data->duration))--}}
        {{--                <div>{{ $movie->data->duration }} min</div>--}}
        {{--            @endif--}}
        {{--            <div>{{ $movie->categories->pluck('name')->join(', ') }}</div>--}}
        {{--        </div>--}}
        @if($movie->providers->isNotEmpty())
            <div class="mb-4 text-sm text-slate-600">
                @foreach($movie->providers as $provider)
                    @if($provider->name == "Netflix")
                        <span
                            class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{$provider->name}}</span>
                    @elseif($provider->name == "HBO Max")
                        <span
                            class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{$provider->name}}</span>
                    @elseif($provider->name == "Disney Plus")
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{$provider->name}}</span>
                    @endif
                @endforeach
            </div>
        @endif

        <div>
            @if($movie->descriptions->isNotEmpty())
                <div class="mb-4 text-slate-600">
                    {{$movie->description}}
                </div>
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
            <p class="ml-2 text-sm font-bold text-gray-900">{{ round($movie->rating, 1) }}</p>
        </div>
    </div>
    <div class="col-span-1 py-4 items-center text-right">
        {{--        <button wire:click="toggleFavourite()" type="button"--}}
        {{--                class="inline-flex h-8 items-center btn-def">--}}
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
<div class="col-span-12 grid-cols-12 grid">
    <div class="col-span-9 py-4">
        @if($movie->actress->isNotEmpty())
            <div class="text-sm grid grid-cols-12 space-y-2 mb-4">
                <div class="col-span-12 mb-1 text-sm">Actors</div>
                @foreach($movie->actress as $actor)
                    <a class="text-blue-700 hover:text-blue-800 col-span-3"
                       href="{{ route('creator', ['creator' => $actor->id, 'creatorSlug' => \Illuminate\Support\Str::slug($actor->name)]) }}">{{$actor->name}}</a>
                @endforeach
            </div>
        @endif

        @if($movie->videos())
            <div class="text-sm mb-4">
                <div class=" mb-1 text-sm">Videos</div>
                @foreach($movie->videos as $video)
                    <div class="flex flex-col items-center mx-auto mb-8">
                        {{--                    <div class="video-wrapper">--}}
                        {{--                        <iframe--}}
                        {{--                            class="video"--}}
                        {{--                            src="https://www.youtube.com/embed/{{$video->url}}?showinfo=0"--}}
                        {{--                            frameborder="0"--}}
                        {{--                            allow="autoplay; encrypted-media"--}}
                        {{--                            showinfo=0--}}
                        {{--                            allowfullscreen>--}}
                        {{--                        </iframe>--}}
                        {{--                    </div>--}}
                        <div class="text-lg">{{ $video->name }}</div>
                        <div class="relative h-0 overflow-hidden max-w-full w-full"
                             style="padding-bottom: 56.25%">
                            <iframe
                                src="https://www.youtube.com/embed/{{$video->url}}?showinfo=0"
                                frameborder="0"
                                allowfullscreen
                                class="absolute top-0 left-0 w-full h-full"
                            ></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="col-span-3 py-4 border-l pl-8">
        @if($movie->tags->isNotEmpty())
            <div>
                <div class="col-span-12 mb-4 text-sm">Keywords</div>
                @foreach($movie->tags as $tag)
                    <button type="button"
                            class="px-2.5 py-0.5 mr-1 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">{{$tag->name}}</button>
                @endforeach
            </div>
        @endif
    </div>
</div>
<div>
    @if(!empty($movie->getMedia('backdrops')->first()))
        <img src="{{ $movie->getMedia('backdrops')->first()->getUrl() }}"/>
    @endif
</div>
