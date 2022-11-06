<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Lariele\Movie\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory(1000)->create();
    }
}
