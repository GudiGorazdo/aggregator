<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DBSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aggregator:dbseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \App\Services\GenerateRandomData::start();
        return Command::SUCCESS;
    }
}


