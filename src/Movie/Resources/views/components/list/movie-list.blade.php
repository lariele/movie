@section('title')
    {{ $title ? Str::ucfirst($title) : '' }}
@endsection
<div class="col-span-12">
    @if($showTitle)
        <h1 class="text-lg font-medium truncate my-4 mr-5">{{ ucfirst($title) }}</h1>
    @endif

    @if($showFilter)
        <x-movie::list.movie-list-filter row={{$rowView}} :categories="$categories" :tags="$tags"/>
    @endif

    @if(!empty($movies))
        <div class="grid grid-cols-{{ $gridCols ?? 12 }} @if($rowView == 'grid') gap-2 @endif">
            @foreach ($movies as $movie)
                <livewire:movie-list-row :movie="$movie" :filter="$filter" :rowView="$rowView"
                                         :wire:key="'movie-list-'.$rowView.$movie->id ?? $movie['id']"
                                         :colSpan="$colSpan" :showRating="$showRating"/>
            @endforeach
        </div>
        @if($loadedAll == false && $showMore)
            <div
                x-data="{
        observe () {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        @this.call('loadMore')
                    }
                })
            }, {
                root: null
            })

            observer.observe(this.$el)
        }
    }"
                x-init="observe"
                class="my-4"
            >
                <x-movie::ui.spinner/>
            </div>
        @endif
    @endif

    {{--                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">--}}
    {{--                    <nav class="w-full sm:w-auto sm:mr-auto">--}}
    {{--                        <ul class="pagination">--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">--}}
    {{--                                    <i class="w-4 h-4" data-lucide="chevrons-left"></i>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">--}}
    {{--                                    <i class="w-4 h-4" data-lucide="chevron-left"></i>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">...</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">1</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item active">--}}
    {{--                                <a class="page-link" href="#">2</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">3</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">...</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">--}}
    {{--                                    <i class="w-4 h-4" data-lucide="chevron-right"></i>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="page-item">--}}
    {{--                                <a class="page-link" href="#">--}}
    {{--                                    <i class="w-4 h-4" data-lucide="chevrons-right"></i>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </nav>--}}
    {{--                    <select class="w-20 form-select box mt-3 sm:mt-0">--}}
    {{--                        <option>10</option>--}}
    {{--                        <option>25</option>--}}
    {{--                        <option>35</option>--}}
    {{--                        <option>50</option>--}}
    {{--                    </select>--}}
    {{--                </div>--}}

</div>
