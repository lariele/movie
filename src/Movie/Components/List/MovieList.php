<?php

namespace Lariele\Movie\Components\List;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Lariele\Movie\Models\Category;
use Lariele\Movie\Services\MovieListService;
use Livewire\Component;

class MovieList extends Component
{
    public ?Collection $movies = null;

    public array $filter = ['has_media' => true, 'has_providers' => true];
    public $filterYear;
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

    protected $listeners = ['refreshList' => '$refresh'];

    protected MovieListService $service;


    public function boot(MovieListService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        if (!empty($this->filterYear)) {
            $this->filter['year'] = $this->filterYear;
        }
        $this->filter['year'] = $this->filterYear;
        $this->getCategories();
        $this->getMovies();
    }

    public function getCategories()
    {
        $this->categories = Category::query()->limit(14)->get();
    }

    public function getMovies()
    {
        $this->movies = $this->service
            ->getMovieListQuery($this->filter)
            ->limit($this->perPage)
            ->get();
    }

    public function updatedFilter($value)
    {
        $this->loadedAll = false;
        $this->perPage = 20;
        $this->getMovies();
    }

    public function loadMore()
    {
        $countStart = $this->movies ? count($this->movies) : null;

        $this->perPage += 20;
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
