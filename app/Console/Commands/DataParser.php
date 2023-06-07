<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
     * Путь к папке с данными из сервисов
     *
     * @var string
     */
    protected $dataPath;

    public function __construct() {
        parent::__construct();
        $this->dataPath = $_SERVER['DOCUMENT_ROOT'] . '/data';
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //$x = new IOFactory();
        var_dump(class_exists('Command'));
        echo $this->dataPath . PHP_EOL;
        echo 'ok' . PHP_EOL;
        return Command::SUCCESS;
    }
}


