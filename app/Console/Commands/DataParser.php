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
    * Путь до папки сервиса
    *
    * @var string
    */
    protected string $serviceFolder = '';

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
     * Список полей в основной таблице
     * В поле subtables лежат ссылки на методы,
     * которые получают данные из ссылок на файлы
     *
     * @var string[]
     */
    protected array $cellsMainTable = [
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
        'subtables' => [
            'C' => 'getBranchesData',
            'M',
            'N',
            'P',
            'Q',
            'U',
            'V',
            'W',
            'AA'
        ],
    ];

    /**
     * Список полей в таблице филиалов
     * Порядок важен (!) он соответствует порядку столбцов в файле таблицы.
     *
     * @var string[]
     */
    protected array $cellsBranchesTable = [ 'A' => 'link' ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Service::all() as $service) {
            $this->serviceFolder = $this->getServiceFolderPath($service->name);
            $tableFile = $this->getTableFilePath();

            if (!is_dir($this->serviceFolder)) {
                echo "Произошла ошибка: папки $this->serviceFolder не существует" . PHP_EOL;
                return Command::SUCCESS;
            }

            $fileData = $this->getFileData($tableFile);


            dump($fileData[1]);
        }

        return Command::SUCCESS;
    }

    private function getBranchesData(string $filePath): array
    {
        $data = [];
        if (!$filePath) return $data;

        return $this->getFileData($filePath, 'branches');

    }

    private function getRowData(Row $row, string $type): array
    {
        $cellsMap = $this->getCellsMap($type);
        $rowData = [];
        foreach ($row->getCellIterator() as $ind => $cell) {
            $cellValue = $cell->getValue();
            $cellName = $cellsMap[$ind];
            if (!($cellValue instanceof RichText)) {
                $rowData[$cellName] = $cellValue;
                continue;
            }

            $richTextElements = $cellValue->getRichTextElements();

            if (empty($richTextElements)) {
                $rowData[$cellName] = null;
                continue;
            }

            $text = $richTextElements[0]->getText();
            if (isset($cellsMap['subtables']) && isset($cellsMap['subtables'][$ind])) {
                $subTablePath = $this->getSubTableFilePath($text);
                $method = $cellsMap['subtables'][$ind];
                $rowData[$cellName] = $this->{ $method }($subTablePath);
                continue;
            }

            $rowData[$cellName] = $text;
        }

        return $rowData;
    }

    private function getFileData(string $filePath, string $type = 'main'): array|false
    {
        if (!file_exists($filePath)) {
            echo "Произошла ошибка: файла $filePath не существует" . PHP_EOL;
            return false;
        }

        $data = [];
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $ind => $row) {
            if ($ind === 1 ) continue;
            $rowData = $this->getRowData($row, $type);
            $data[] = $rowData;
        }

        unset($spreadsheet);
        return $data;
    }

    private function getCellsMap(string $type): array
    {
        switch ($type) {
            case 'main':
                return $cellsMap = $this->cellsMainTable;
            case 'branches':
                return $cellsMap = $this->cellsBranchesTable;
        }
    }

    private function getServiceFolderPath(string $name): string
    {
        return base_path() . $this->dataPath . '/' . $name;
    }

    private function getTableFilePath(): string
    {
        return $this->serviceFolder . '/' . $this->tableFileName;
    }

    private function getSubTableFilePath(string $subTableFile): string
    {
        return $this->serviceFolder . '/' . $subTableFile;
    }
}


