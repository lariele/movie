<?php

namespace Lariele\Movie\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Lariele\Movie\Models\Movie;
use Livewire\Component;

class MovieDetail extends Component
{
    public Movie $movie;

    /**
     *
     *
     * @var array|string[]
     */
    protected array $rules = [
        'order.customer_name' => 'max:32',
        'order.customer_address' => 'string',
        'order.price' => 'numeric',
        'order.status' => 'string',
        'order.ordered_at' => 'string',
    ];

    public function mount(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function render(): Factory|View|Application
    {
        return view('movie::components.movie-detail');
    }
}
