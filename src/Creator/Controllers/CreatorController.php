<?php

namespace App\SFD\Creator\Controllers;

use App\Http\Controllers\Controller;
use App\SFD\Creator\Models\Creator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CreatorController extends Controller
{
    /**
     * Show creator detail
     *
     * @param Creator $creator
     * @return Factory|View|Application
     */
    public function show(Creator $creator): Factory|View|Application
    {
        return view('creator.show')->with([
            'creator' => $creator
        ]);
    }
}
