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
    protected string $tableFileName = 'data.xlsx';

    /**
     * Путь к папке(относительно корня проекта) с данными из сервисов
     *
     * @var string
     */
    protected string $dataPath = '/data';

    /**
     * Список полей в таблице
     * Порядок важен (!) он соответствует порядку столбцов в файле таблицы.
     *
     * @var string[]
     */

    protected array $cells = [
        'A' => 'link',
        'B' => 'id',
        'C' => 'branches',
        'D' => 'name',
        'E' => 'description',
        'F' => 'activity',
        'G' => 'region',
        'H' => 'city',
        'I' => 'municipality',
        'J' => 'area',
        'K' => 'address',
        'L' => 'zip',
        'M' => 'nearest_metro',
        'N' => 'nearest_stops',
        'O' => 'coordinates',
        'P' => 'phones',
        'Q' => 'web',
        'R' => 'whatsapp',
        'S' => 'telegram',
        'T' => 'vk',
        'U' => 'add_socials',
        'V' => 'mail',
        'W' => 'working_mode',
        'X' => 'logo',
        'Y' => 'photos',
        'Z' => 'rating',
        'AA' => 'respones',
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
            $fileData = $this->getFileData($worksheet);
            //$data = $this->createDataArray($fileData);


            dump($fileData[1]);
            //dump($data[1]);
            //dump(scandir($serviceFolder));

            //fclose($spreadsheet->getStream());
            //$spreadsheet->disconnectAllContainers();
            unset($spreadsheet);
        }

        return Command::SUCCESS;
    }

    private function createDataArray(array $fileData): array
    {
        $data = [];
        foreach ($fileData as $row) {
            //$rowData =
            foreach($row as $ind => $cell) {
                dd($row[$ind]);
            }
        }
        return $data;
    }

    private function getRowData(Row $row): array
    {
        $rowData = [];
        foreach ($row->getCellIterator() as $ind => $cell) {
            $cellValue = $cell->getValue();
            if (!($cellValue instanceof RichText)) {
                $rowData[$this->cells[$ind]] = $cellValue;
                continue;
            }

            $richTextElements = $cellValue->getRichTextElements();

            if (!empty($richTextElements)) {
                $rowData[$this->cells[$ind]] = $richTextElements[0]->getText();
            } else {
                $rowData[$this->cells[$ind]] = null;
            }
        }

        return $rowData;
    }

    private function getFileData(Worksheet $worksheet): array
    {
        $data = [];
        foreach ($worksheet->getRowIterator() as $ind => $row) {
            if ($ind === 1 ) continue;
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


