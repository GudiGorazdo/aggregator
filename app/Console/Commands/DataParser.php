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
        'M' => 'subways',
        'N' => 'transportation',
        'O' => 'coordinates',
        'P' => 'phones',
        'Q' => 'web',
        'R' => 'whatsapp',
        'S' => 'telegram',
        'T' => 'vk',
        'U' => 'additional_socials',
        'V' => 'mail',
        'W' => 'working_mode',
        'X' => 'logo',
        'Y' => 'photos',
        'Z' => 'rating',
        'AA' => 'reviews',
        'subtables' => [
            'C',
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
     *
     * @var string[]
     */
    protected array $cellsBranchesTable = [ 'A' => 'array.link' ];

    /**
     * Список полей в таблице c ближайшими станциями метро
     *
     * @var string[]
     */
    protected array $cellsSubwaysTable = [
        'A' => 'name',
        'B' => 'distance',
        'C' => 'line_name',
    ];

    /**
     * Список полей в таблице c ближайшими
     *
     * остановками общественного транспорта
     * @var string[]
     */
    protected array $cellsTransportationTable = [
        'A' => 'name',
        'B' => 'distance',
    ];

    /**
     * Список полей в таблице телефонов
     *
     * @var string[]
     */
    protected array $cellsPhonesTable = [ 'A' => 'array.phone' ];

    /**
     * Список полей в таблице сайтов
     *
     * @var string[]
     */
    protected array $cellsWebsTable = [ 'A' => 'array.web' ];

    /**
     * Список полей в таблице дополнительных ссылок
     * на социальные сети
     *
     * @var string[]
     */
    protected array $cellsAdditionalSocialsTable = [ 'A' => 'array.additional_socials' ];

    /**
     * Список полей в таблице адресов почты
     *
     * @var string[]
     */
    protected array $cellsMailTable = [ 'A' => 'array.mail' ];

    /**
     * Список полей в таблице графика работы
     *
     * @var string[]
     */
    protected array $cellsWorkingModeTable = [
        'A' => 'day',
        'B' => 'start',
        'C' => 'end',
    ];

    /**
     * Список полей в таблице отзывов
     *
     * @var string[]
     */
    protected array $cellsReviewsTable = [
        'A' => 'date',
        'B' => 'rating',
        'C' => 'user_name',
        'D' => 'text',
        'E' => 'response_date',
        'F' => 'response_text',
    ];

    /**
     * Таблицы без заголовков
     *
     * @var string[]
     */
    protected array $tablesWithoutHeaders = [ 'phones', 'web', 'additional_socials', 'mail' ];

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


            dump($fileData[6]);
        }

        return Command::SUCCESS;
    }

    private function getRowData(Row $row, string $type)
    {
        $cellsMap = $this->getCellsMap($type);
        $rowData = [];
        foreach ($row->getCellIterator() as $ind => $cell) {
            $cellArray = false;
            $cellValue = $cell->getValue();
            $cellName = $cellsMap[$ind];
            if (strpos($cellName, "array.") !== false) {
                $cellName = preg_replace("/array./", "", $cellName);
                $cellArray = true;
            }

            if (!($cellValue instanceof RichText)) {
                if ($cellArray) $rowData = $cellValue;
                else $rowData[$cellName] = $cellValue;
                continue;
            }

            $richTextElements = $cellValue->getRichTextElements();

            if (empty($richTextElements)) {
                if ($cellArray) $rowData = null;
                else $rowData[$cellName] = null;
                continue;
            }

            $text = $richTextElements[0]->getText();
            if (isset($cellsMap['subtables']) && in_array($ind, $cellsMap['subtables'])) {
                $subTablePath = $this->getSubTableFilePath($text);
                $rowData[$cellName] = $this->getFileData($subTablePath, $cellName);
                if (is_array($rowData[$cellName])) {
                    $rowData[$cellName] = $this->removeNullEl($rowData[$cellName]);
                }
                continue;
            }

            if ($cellArray) $rowData = $text;
            else $rowData[$cellName] = $text;
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
            if ($ind === 1 && !in_array($type, $this->tablesWithoutHeaders)) continue;
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
                return $this->cellsMainTable;
            case 'branches':
                return $this->cellsBranchesTable;
            case 'subways':
                return $this->cellsSubwaysTable;
            case 'transportation':
                return $this->cellsTransportationTable;
            case 'phones':
                return $this->cellsPhonesTable;
            case 'web':
                return $this->cellsWebsTable;
            case 'additional_socials':
                return $this->cellsAdditionalSocialsTable;
            case 'mail':
                return $this->cellsMailTable;
            case 'working_mode':
                return $this->cellsWorkingModeTable;
            case 'reviews':
                return $this->cellsReviewsTable;
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

    private function removeNullEl(array $array): array
    {
        return array_filter($array, function ($value) {
            return $value !== null;
        });
    }
}


