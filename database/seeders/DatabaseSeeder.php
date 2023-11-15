<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private function echoStart(string $modelName): void
    {
        echo "{$modelName} start -- ";
    }

    private function echoFinish(string $modelName): void
    {
        echo "{$modelName} finish" . PHP_EOL;
    }

    private function seedModel(string $modelClass, int $count, string $modelName, string|bool $attach = false): void
    {
        $this->echoStart($modelName);

        $modelFactory = resolve($modelClass)::factory();

        if ($modelFactory instanceof Factory) {
            $modelFactory->count($count)->create();
        }

        $this->echoFinish($modelName);
    }

    private function seedShopSubways()
    {
        $this->echoStart('shop subways');

        $shops = \App\Models\Shop::all();

        foreach ($shops as $shop) {
            $subwayIds = \App\Models\Subway::where('area_id', $shop->area_id)->inRandomOrder()->limit(3)->pluck('id');
            $subwayIds && $shop->subways()->syncWithoutDetaching($subwayIds);
        }

        $this->echoFinish('shop subways');
    }

    private function seedServices()
    {
        $this->echoStart('services');

        $services = [
            ['Яндекс карты', 'yandex-logo.svg'],
            ['Google maps', 'google-maps-logo.svg'],
            ['2Gis', '2gis-logo.svg'],
            ['Авито', 'avito-logo.svg']
        ];

        foreach ($services as $service) {
            \App\Models\Service::factory()->create([
                'name' => $service[0],
                'logo' => $service[1],
            ]);
        }

        $this->echoFinish('services');
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedServices();
        $this->seedModel(\App\Models\Region::class, 3, 'regions');
        $this->seedModel(\App\Models\City::class, 5, 'cities');
        $this->seedModel(\App\Models\Area::class, 30, 'area');
        $this->seedModel(\App\Models\Municipality::class, 40, 'municipalities');
        $this->seedModel(\App\Models\Subway::class, 100, 'subways');
        $this->seedModel(\App\Models\Category::class, 20, 'categories');
        $this->seedModel(\App\Models\SubCategory::class, 200, 'subcategories');
        $this->seedModel(\App\Models\Shop::class, 2000, 'shops');
        $this->seedShopSubways();
    }
}
