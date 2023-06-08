<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Services\ImportDataService;

class DataParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aggregator:import-data { --cityID= : city ID }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database fom data folder. Requirement option --cityID';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImportDataService $importDataService)
    {
        $cityID = (int)$this->option('cityID');
        $importDataService->import($cityID);
        return Command::SUCCESS;
    }
}


