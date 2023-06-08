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
    protected $signature = 'aggregator:import-data { --regionID= : region ID }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database fom data folder. Requirement option --regionID';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImportDataService $importDataService)
    {
        $regionID = (int)$this->option('regionID');
        $importDataService->import($regionID);
        return Command::SUCCESS;
    }
}


