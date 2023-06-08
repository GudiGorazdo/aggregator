<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use \App\Models\Service;
use \App\Models\City;
use \App\Models\Area;
use \App\Models\Municipality;
use \App\Models\Shop;

/**
 * Класс импортирует данные из таблицы xcel и папок
 * Для успешной работы необходимо
 * сохранять структуру таблицы и папок
 */

class ImportDataService
{
    /**
    * Ид региона
    *
    * @var string
    */
    protected int $regionID = 0;

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
     * Список полей в основной таблице.
     * В поле subtables список полей, в которых
     * не данные, а ссылки на файлы с данными
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
        'subtables' => [ 'C', 'M', 'N', 'P', 'Q', 'U', 'V', 'W', 'AA' ],
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
    public function import(int $regionID)
    {
        $this->regionID = $regionID;
        foreach (Service::all() as $service) {
            // получаем путь до папки с данными
            $this->serviceFolder = $this->getServiceFolderPath($service->name);

            // получаем пути до основного файла-таблицы
            $tableFile = $this->getTableFilePath();

            // проверяем что папка с данными существует
            if (!is_dir($this->serviceFolder)) {
                echo "Произошла ошибка: папки $this->serviceFolder не существует" . PHP_EOL;
                return Command::SUCCESS;
            }

            // получаем данные из основного файла-таблицы, записываем их в массив
            $fileData = $this->getFileData($tableFile);

            // записываем данные в базу данных
            $this->saveToDB($fileData, $regionID);
        }
    }

    private function saveToDB(array $data): bool
    {
        foreach ($data as $shopData) {
            $city = $this->getCity($shopData['city']);
            $municipality = $this->getMunicipal($city->id, $shopData['municipality']);
            $area = $this->getArea($city->id, $shopData['area']);
            $shop = $this->createShop($shopData, $city->id, $municipality->id ?? null, $area->id ?? null);
        }

        dump($data[5]);
        return true;
    }

    private function createShop(array $shopData, int $cityID, int|null $municipalityID, int|null $areaID): Shop|false
    {
        if ($shop = $this->checkShopByCoord($shopData)) {
            return $shop;
        } else {
            return Shop::create([
                'region_id' => $this->regionID,
                'city_id' => $cityID,
                'municipality_id' => $municipalityID,
                'area_id' => $areaID,
                'logo' => '',
                'photos' => '',
                'title' => '',
                'name' => $shopData['name'],
                'description' => $shopData['description'],
                'zip' => $shopData['zip'],
                'coord' => $shopData['coordinates'],
                'address' => $shopData['address'],
                'phone' => $shopData['phones'][0] ?? null,
                'additional_phones' => is_array($shopData['phones'])
                    ? json_encode( array_slice($shopData['phones'], 1) )
                    : null,
                'whatsapp' => $shopData['whatsapp'],
                'telegram' => $shopData['telegram'],
                'vk' => $shopData['vk'],
                'web' => json_encode($shopData['web']),
                'more_socials' => json_encode($shopData['additional_socials']),
                'emails' => json_encode($shopData['mail']),
            ]);
        }
    }

    private function checkShopByCoord(array $shopData): Shop|null
    {
        if (is_null($shopData['coordinates'])) return null;

        [ $latitude, $longitude ] = explode(',', $shopData['coordinates']);
        $radius = 1;

        return Shop::select('*')
            ->selectRaw(
                "(6371000 * acos(cos(radians(?)) * cos(radians(SUBSTRING_INDEX(coord, ',', 1))) *
                cos(radians(SUBSTRING_INDEX(coord, ',', -1)) - radians(?)) +
                sin(radians(?)) * sin(radians(SUBSTRING_INDEX(coord, ',', 1))))) AS distance",
                [$latitude, $longitude, $latitude]
            )
            ->whereJsonContains('additional_phones', $shopData['phones'])
            ->orWhere('phone', $shopData['phones'][0] ?? null)
            ->whereJsonContains('emails', $shopData['mail'])
            ->whereJsonContains('web', $shopData['web'])
            ->where('whatsapp', $shopData['whatsapp'])
            ->where('telegram', $shopData['telegram'])
            ->where('vk', $shopData['vk'])
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get()
            ->first()
        ;
    }

    private function getMunicipal(int $cityID, string|null $name): Municipality|false
    {
        if (!$name) return false;
        return Municipality::firstOrCreate([
            'region_id' => $this->regionID,
            'city_id' => $cityID,
            'name' => $name,
        ]);
    }

    private function getArea(int $cityID, string|null $name): Area|false
    {
        if (!$name) return false;
        if (strpos($name, " район") !== false) {
            $name = preg_replace("/ район/", "", $name);
        }

        return Area::firstOrCreate([
            'region_id' => $this->regionID,
            'city_id' => $cityID,
            'name' => $name,
        ]);
    }

    private function getCity(string $name): City
    {
        return City::firstOrCreate([
            'region_id' => $this->regionID,
            'name' => $name,
        ]);
    }

    /**
     * Получает данные из строки файла
     *
     * @param $row объект класса use PhpOffice\PhpSpreadsheet\Worksheet\Row
     *             строка из файла для получения данных
     *
     * @param $type название ячейки, необходимо для получения списка
     *              полей в подтаблице, если она есть
     *              (когда в главной таблице вместо данных ссылка на файл с данными)
     */

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

    /**
    * открывает файл и читает его построчно, записывает данные в массив
    *
    * @param $filePath путь до файла
    *
    * @param $type название ячейки, необходимо для получения списка
    *              полей в подтаблице, если она есть
    *              (когда в главной таблице вместо данных ссылка на файл с данными)
    */

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


