<?php

namespace Lariele\Movie\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Lariele\Movie\Services\MovieListService;
use Livewire\Component;

class Search extends Component
{
    public $filter;

    public $results;

    protected MovieListService $service;


    public function boot(MovieListService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->results = collect([]);
    }

    public function updatedFilterSearch($value)
    {
        $this->search($value);
    }

    public function search($value)
    {
        $this->results = !empty($value) ? $this->getMovies($value) : collect([]);
    }

    public function getMovies($search): array|Collection
    {
        return $this->service
            ->getMovieListQuery(['search' => $search])
            ->limit(10)
            ->get();
    }

    public function render(): Factory|View|Application
    {
        return view('movie::components.search');
    }
}
