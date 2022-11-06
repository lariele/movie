<?php

namespace Lariele\Movie;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Lariele\Movie\Components\List\MovieList;
use Lariele\Movie\Components\List\MovieListRow;

class MovieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/Resources/views', 'movie');
        $this->publishes([
            __DIR__.'/Resources/views' => resource_path('views/vendor/lariele/movie'),
            __DIR__.'/Database/Factories' => database_path('factories'),
            __DIR__.'/Database/Migrations' => database_path('migrations'),
            __DIR__.'/Database/Seeders' => database_path('seeders'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        #Livewire::component('order-list-filter', OrderListFilter::class);
        Livewire::component('movie-list',MovieList::class);
        Livewire::component('movie-list-row',MovieListRow::class);
//        Livewire::component('order-search', Search::class);
        //
    }
}
