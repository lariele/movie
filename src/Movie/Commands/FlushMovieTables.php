<?php

namespace Lariele\Movie\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Lariele\MovieApiTMDB\API\MovieTMDBApi;
use Lariele\MovieApiTMDB\Services\MovieApiTMDBImportService;

class FlushMovieTables extends Command
{
    protected MovieTMDBApi $movieApi;
    protected MovieApiTMDBImportService $movieApiTMDBImportService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:flush-movie-tables';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->flushTables();

        return Command::SUCCESS;
    }

    private function flushTables()
    {
        DB::table('externals')->delete();
        DB::table('movies_data')->delete();
        DB::table('movies')->delete();

        DB::table('countrisables')->delete();
        DB::table('creatables')->delete();
        DB::table('taggables')->delete();
        DB::table('providerables')->delete();
        DB::table('media')->delete();

    }
}
