@section('title')
    {{ $creator->name }}
@endsection
<div class="col-span-12">
    <h1 class="text-lg font-medium truncate mt-4 mr-5">{{ $creator->name }}<span
            class="ml-2 font-normal text-slate-600"></span></h1>
</div>
<div>
    <div class="block sm:flex items-center">
        <h2 class="text-lg font-medium truncate mt-4 mr-5">New movies with {{ $creator->name }}</h2>
    </div>
    @php
        $filter['has_actors'][] = $creator->id;
        $filter['sort_by'] = ['column' => 'year', 'direction' => 'DESC'];
    @endphp
    <livewire:movie-list :showTitle="false" :showFilter="false" :showMore="false" :limit="6"
                         :perPage="4" gridCols='8' colSpan='1' :showRating="true" :filter="$filter"
    />
</div>

<div>
    <div class="block sm:flex items-center mt-4">
        <h2 class="text-lg font-medium truncate mt-4 mr-5">2022 Movies with {{ $creator->name }}</h2>
    </div>
    @php
        $filter['has_actors'][] = $creator->id;
        $filter['year_from'] = 2000;
        $filter['year_to'] = 2023;
        $filter['sort_by'] = ['column' => 'rating', 'direction' => 'DESC'];

    @endphp
    <livewire:movie-list :rowView="'grid'" :showTitle="false" :showFilter="false" :showMore="false" :limit="6"
                         :perPage="8" gridCols='8' colSpan='1' :showRating="true" :filter="$filter"
    />
</div>

<div>
    <div class="block sm:flex items-center mt-4">
        <h2 class="text-lg font-medium truncate mt-4 mr-5">Top Action movies with {{ $creator->name }}</h2>
    </div>
    @php
        $filter['has_actors'][] = $creator->id;
        $filter['sort_by'] = ['column' => 'rating', 'direction' => 'DESC'];
        $filter['has_categories'][] = \Lariele\Movie\Models\Category::query()->where(['name'=>'Action'])->first()['id'];

    @endphp
    <livewire:movie-list :rowView="'grid'" :showTitle="false" :showFilter="false" :showMore="false" :limit="6"
                         :perPage="8" gridCols='8' colSpan='1' :showRating="true" :filter="$filter"
    />
</div>

<div>
    <div class="block sm:flex items-center mt-4">
        <h2 class="text-lg font-medium truncate mt-4 mr-5">Top Sci-Fi movies with {{ $creator->name }}</h2>
    </div>
    @php
        $filter = [];
        $filter['has_actors'][] = $creator->id;
        $filter['sort_by'] = ['column' => 'rating', 'direction' => 'DESC'];
        $filter['has_categories'][] = \Lariele\Movie\Models\Category::query()->where(['name'=>'Science Fiction'])->first()['id'];

    @endphp
    <livewire:movie-list :rowView="'grid'" :showTitle="false" :showFilter="false" :showMore="false" :limit="6"
                         :perPage="8" gridCols='8' colSpan='1' :showRating="true" :filter="$filter"
    />
</div>

<div>
    <div class="block sm:flex items-center">
        <h2 class="text-lg font-medium truncate mb-4 mt-4 mr-5">Top movies with {{ $creator->name }}</h2>
    </div>
    @php
        $filter = [];
            $filter['has_actors'][] = $creator->id;
             $filter['sort_by'] = ['column' => 'rating', 'direction' => 'DESC'];
    @endphp
    <livewire:movie-list :showTitle="false" :showMore="false" :limit="6"
                         :perPage="6" gridCols='8' colSpan='1' :showRating="true" :filter="$filter"
    />
</div>
