<?php

namespace Lariele\Movie;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Lariele\Creator\Components\CreatorDetail;
use Lariele\Movie\Commands\FlushMovieTables;
use Lariele\Movie\Components\List\MovieList;
use Lariele\Movie\Components\List\MovieListRow;
use Lariele\Movie\Components\MovieDetail;
use Lariele\Movie\Components\Search;
use Livewire\Livewire;

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
        if ($this->app->runningInConsole()) {
            $this->commands([
                FlushMovieTables::class,
            ]);
        }

        Relation::morphMap(config('models.map'));

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewsFrom(__DIR__ . '/Resources/views', 'movie');
        $this->loadViewsFrom(__DIR__ . '/../Creator/Resources/views', 'movie-creator');

        $this->publishes([
            __DIR__ . '/Resources/views' => resource_path('views/vendor/lariele/movie'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/Database/Factories' => database_path('factories'),
            __DIR__ . '/Database/Migrations' => database_path('migrations'),
            __DIR__ . '/Database/Seeders' => database_path('seeders'),
        ], 'database');

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        Livewire::component('movie-list', MovieList::class);
        Livewire::component('movie-detail', MovieDetail::class);
        Livewire::component('movie-list-row', MovieListRow::class);
        Livewire::component('movie-search', Search::class);

        Livewire::component('movie-creator-detail', CreatorDetail::class);
    }
}
