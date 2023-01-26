<?php

namespace Lariele\Movie\Components\List;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Lariele\Movie\Models\Category;
use Lariele\Movie\Services\MovieListService;
use Lariele\Tag\Models\Tag;
use Livewire\Component;

class MovieList extends Component
{
    public ?Collection $movies = null;

    public string $title;
    public array $filter;
    public int $filterYear;
    public ?int $yearFrom = null;
    public ?int $yearTo = null;
    public ?array $genres = [];
    public ?array $keywords = [];
    public ?array $providers = [];
    public $categories;
    public $gridCols;
    public $colSpan;
    public $showRating;
    public int $perPage = 15;
    public int $limit = 15;

    public string $rowView = 'list';
    public bool $showTitle = true;
    public bool $showFilter = true;
    public bool $showMore = true;
    public bool $loadedAll = false;

    protected $queryString = [
        'yearFrom',
        'yearTo',
        'genres',
        'keywords',
        'providers',
    ];

    protected $listeners = ['refreshList' => '$refresh'];

    protected MovieListService $service;


    public function boot(MovieListService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->filter['has_media'] = true;
        $this->filter['has_providers'] = true;

        if (!empty($this->filterYear)) {
            $this->filter['year'] = $this->filterYear;
        }

        $this->getCategories();
        $this->getTags();
        $this->getMovies();
    }

    public function getCategories()
    {
        $this->categories = Category::query()->limit(14)->get();
    }

    public function getTags()
    {
        $this->tags = Tag::query()->limit(14)->get();

    }

    public function getMovies()
    {
        if (!empty($this->yearFrom)) {
            $this->filter['year_from'] = $this->yearFrom;
        }
        if (!empty($this->yearTo)) {
            $this->filter['year_to'] = $this->yearTo;
        }
        if (!empty($this->genres)) {
            $this->filter['has_categories'] = collect($this->genres)->filter()->toArray();
        }
        if (!empty($this->keywords)) {
            $this->filter['has_tags'] = collect($this->keywords)->filter()->toArray();
            foreach ($this->keywords as $k => $keyword) {
                if (in_array($keyword, $this->tags->keys()->toArray()) === false) {
                    $this->tags->push(Tag::query()->where('id', $keyword)->first());
                }
            }

        }
        if (!empty($this->providers)) {
            $this->filter['has_providers'] = collect($this->providers)->filter()->toArray();
        }

        $this->movies = $this->service
            ->getMovieListQuery($this->filter)
            ->with(['actress', 'descriptions', 'media', 'data', 'categories', 'providers'])
            ->limit($this->perPage)
            ->get();

        $this->getTitle();
    }

    public function getTitle()
    {
        $title = '';

        foreach (collect($this->genres)->filter()->toArray() as $genre) {
            $title .= ' ' . $this->categories->firstWhere('id', $genre)->name;
        }

        foreach (collect($this->keywords)->filter()->toArray() as $keyword) {
            $title .= ' ' . $this->tags->firstWhere('id', $keyword)->name;
        }

        $title .= ' movies ';

        if (!empty($this->providers)) {
            $title .= ' on';

            foreach (collect($this->providers)->filter()->toArray() as $provider => $used) {
                $title .= ' ' . Str::ucfirst($provider);
            }
        }

        $this->title = Str::ucfirst(trim($title));
    }

    public function updatedFilter($value)
    {
        $this->refreshMovies();
    }

    public function refreshMovies()
    {
        $this->loadedAll = false;
        $this->perPage = 15;
        $this->getMovies();
    }

    public function updatedYearFrom($value)
    {
        $this->refreshMovies();
    }

    public function updatedYearTo($value)
    {
        $this->refreshMovies();
    }

    public function updatedGenres($value)
    {
        $this->refreshMovies();
    }

    public function updatedKeywords($value)
    {
        $this->refreshMovies();
    }

    public function updatedProviders($value)
    {
        $this->refreshMovies();
    }

    public function loadMore()
    {
        $countStart = $this->movies ? count($this->movies) : null;

        $this->perPage += 15;
        $this->getMovies();

        if ($countStart === count($this->movies)) {
            $this->loadedAll = true;
        }
    }

    public function filterViewList()
    {
        $this->rowView = 'list';
    }

    public function filterViewBoxed()
    {
        $this->rowView = 'grid';
    }

    public function render(): Factory|View|Application
    {
        return view('movie::components.list.movie-list');
    }
}
