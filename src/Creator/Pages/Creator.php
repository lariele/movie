<?php

namespace Lariele\Creator\Pages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Lariele\Creator\Models\Creator as CreatorModel;
use Livewire\Component;

class Creator extends Component
{
    public $creator;

    public function mount(CreatorModel $creator)
    {

    }

    public function render(): Factory|View|Application
    {
        return view('movie-creator::pages.creator');
    }
}
