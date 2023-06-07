<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use \App\Models\Service;

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
    * Название файла основной таблицы сервиса
    *
    * @var string
    */
    protected $tableFileName = 'data.xlsx';

    /**
     * Путь к папке(относительно корня проекта) с данными из сервисов
     *
     * @var string
     */
    protected $dataPath = '/data';

    /**
     * Список полей в таблице
     * Порядок важен (!) он соответствует порядку столбцов в файле таблицы.
     *
     * @var array
     */

    protected $cells = [
        'link',
        'id',
        'branches',
        'name',
        'description',
        'activity',
        'region',
        'city',
        'municipality',
        'area',
        'address',
        'zip',
        'nearest_metro',
        'nearest_stops',
        'coordinates',
        'phones',
        'web',
        'whatsapp',
        'telegram',
        'vk',
        'add_socials',
        'mail',
        'working_mode',
        'logo',
        'photos',
        'rating',
        'respones',
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Service::all() as $service) {
            $serviceFolder = $this->getServiceFolderPath($service->name);
            $tableFile = $this->getTableFilePath($serviceFolder);

            if (!is_dir($serviceFolder)) {
                echo "Произошла ошибка: папки $serviceFolder не существует" . PHP_EOL;
                return Command::FAILURE;
            }
            if (!file_exists($tableFile)) {
                echo "Произошла ошибка: файла $tableFile не существует" . PHP_EOL;
                return Command::FAILURE;
            }

            $spreadsheet = IOFactory::load($tableFile);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $this->getFileData($worksheet);

            dump($data[1]);
            //dump(scandir($serviceFolder));

            //fclose($spreadsheet->getStream());
            //$spreadsheet->disconnectAllContainers();
            unset($spreadsheet);
        }

        return Command::SUCCESS;
    }

    private function getRowData(Row $row): array
    {
        $rowData = [];
        foreach ($row->getCellIterator() as $cell) {
            $cellValue = $cell->getValue();
            if (!($cellValue instanceof RichText)) {
                $rowData[] = $cellValue;
                continue;
            }

            $richTextElements = $cellValue->getRichTextElements();

            if (!empty($richTextElements)) {
                $rowData[] = $richTextElements[0]->getText();
            } else {
                $rowData[] = null;
            }
        }

        return $rowData;
    }

    private function getFileData(Worksheet $worksheet): array
    {
        $data = [];
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = $this->getRowData($row);
            $data[] = $rowData;
        }

        return $data;
    }

    private function getServiceFolderPath(string $name): string
    {
        return base_path() . $this->dataPath . '/' . $name;
    }

    private function getTableFilePath(string $serviceFolder): string
    {
        return $serviceFolder . '/' . $this->tableFileName;
    }
}


