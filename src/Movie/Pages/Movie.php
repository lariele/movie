<?php

namespace Lariele\Movie\Pages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Lariele\Movie\Models\Movie as MovieModel;
use Livewire\Component;

class Movie extends Component
{
    public MovieModel $movie;

    public function mount(MovieModel $movie)
    {

    }

    public function render(): Factory|View|Application
    {
        return view('movie::pages.movie');
    }
}
