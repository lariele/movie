<?php

namespace Lariele\Creator\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Lariele\Creator\Models\Creator;
use Livewire\Component;

class CreatorDetail extends Component
{
    public Creator $creator;

    public function mount(Creator $creator)
    {
        $this->creator = $creator;
    }

    public function render(): Factory|View|Application
    {
        return view('movie-creator::components.creator-detail');
    }
}
