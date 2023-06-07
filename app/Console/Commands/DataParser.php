<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DataParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aggregator:import-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database fom data folder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'ok' . PHP_EOL;
        return Command::SUCCESS;
    }
}


