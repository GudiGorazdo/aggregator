<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private function echoStart(string $modelName): void
    {
        echo "{$modelName}";
    }

    private function echoFinish(string $modelName): void
    {
        $strWidth = strlen($modelName) + strlen(' DONE');
        $terminalWidth = (int)shell_exec('tput cols');
        if (!$terminalWidth || $terminalWidth > 100) {
            $terminalWidth = 100;
        } else if ($terminalWidth <= $strWidth) {
            $terminalWidth = $strWidth + 1;
        }
        $padding = str_repeat('.', $terminalWidth - $strWidth);
        echo "{$padding} DONE" . PHP_EOL;
    }

    private function executeWithLogging(string $message, callable $callback): void
    {
        $this->echoStart($message);
        $callback();
        $this->echoFinish($message);
    }

    private function seedModel(string $modelClass, int $count, string $modelName): void
    {
        $this->executeWithLogging($modelName, function () use ($modelClass, $count) {
            $modelFactory = resolve($modelClass)::factory();

            if ($modelFactory instanceof Factory) {
                $modelFactory->count($count)->create();
            }
        });
    }

    private function seedCategoriesAndSubCategories(string $message): void
    {
        $this->executeWithLogging($message, function () {
            \App\Models\Category::factory()
                ->has(\App\Models\SubCategory::factory()->count(30))
                ->count(15)
                ->create();
        });
    }

    private function seedServices(string $message): void
    {
        $this->executeWithLogging($message, function () {
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
        });
    }

    private function seedShopSubways(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $shops = \App\Models\Shop::all();
            foreach ($shops as $shop) {
                $ids = \App\Models\Subway::where('area_id', $shop->area_id)->inRandomOrder()->limit(rand(1, 3))->pluck('id');
                $ids && $shop->subways()->syncWithoutDetaching($ids);
            }
        });
    }

    private function seedShopServices(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $shops = \App\Models\Shop::all();
            $services = \App\Models\Service::all();

            foreach ($shops as $shop) {
                foreach ($services as $service) {
                    $comments = [];
                    for ($i = 0; $i < rand(1, 7); $i++) {
                        $comments[$i] = [
                            'name' => 'name_' . ($i + 1),
                            'date' => date('Y-m-d', mt_rand(1, time())),
                            'rating' => rand(11, 50) / 10,
                            'text' => implode('', fake()->paragraphs()),
                            'response' => [],
                        ];
                        if (rand(0, 1) > 0) {
                            $comments[$i]['response'] = [
                                'name' => 'name',
                                'date' => date('Y-m-d', mt_rand(1, time())),
                                'rating' => rand(11, 50) / 10,
                                'text' => implode('', fake()->paragraphs()),
                            ];
                        }
                    }

                    \Illuminate\Support\Facades\DB::table('shop_services')->insert([
                        'shop_id' => $shop->id,
                        'service_id' => $service->id,
                        'service_shop_id' => fake()->uuid(),
                        'rating' => rand(11, 50) / 10,
                        'rating_count' => rand(10, 100),
                        'link' => '#',
                        'comments' => json_encode($comments),
                    ]);
                }
            }
        });
    }

    private function seedShopCategories(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $shops = \App\Models\Shop::all();
            foreach ($shops as $shop) {
                $ids = \App\Models\Category::inRandomOrder()->limit(rand(3, 15))->pluck('id');
                $ids && $shop->categories()->syncWithoutDetaching($ids);
            }
        });
    }

    private function seedShopSubCategories(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $shops = \App\Models\Shop::with('categories')->get();
            foreach ($shops as $shop) {
                foreach ($shop->categories as $category) {
                    $subCategoryIds = \App\Models\SubCategory::where('category_id', $category->id)
                        ->inRandomOrder()
                        ->limit(rand(1, 15))
                        ->pluck('id')
                        ->toArray();

                    if (!empty($subCategoryIds)) {
                        $shop->subcategories()->syncWithoutDetaching($subCategoryIds);
                    }
                }
            }
        });
    }

    private function seedShopWorkingMode(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $shops = \App\Models\Shop::all();
            foreach ($shops as $shop) {
                $firstOpen = false;
                $firstOpenTime = null;

                $nextDay = fake()->boolean(80); // 80% вероятность, что открыто
                $bDay = false;
                $bDayClose = false;

                for ($i = 1; $i <= 7; $i++) {
                    $shop_id = $shop->id;
                    $day_of_week = $i;
                    $is_open = $nextDay;
                    if ($i == 7) $nextDay = false;
                    else $nextDay = fake()->boolean(80);
                    $minutesOpen = fake()->boolean() ? '30' : '00';
                    $minutesClose = fake()->boolean() ? '30' : '00';
                    if ($shop->convenience) {
                        if ($bDay && is_null($bDayClose)) {
                            $open_time = null;
                        } else if (($is_open && !$bDay) || !$bDay) {
                            $open_time = rand(8, 12) . ':' . $minutesOpen;
                        }
                        if (!$nextDay) {
                            $close_time = rand(18, 21) . ':' . $minutesClose;
                        } else {
                            $close_time = null;
                        }
                    } else {
                        if ($bDay && is_null($bDayClose)) {
                            $open_time = null;
                        } else if ($nextDay && !is_null($bDayClose)) {
                            $open_time = rand(8, 12) . ':' . $minutesOpen;
                        } else if (($is_open && !$bDay) || !$bDay) {
                            $open_time = rand(8, 12) . ':' . $minutesOpen;
                        } else {
                            $open_time = fake()->boolean() ? rand(8, 12) . ':' . $minutesOpen : null; // 50% вероятность, что будет время открытия
                        }
                        if (!$nextDay || ($i == 7 && $firstOpen && !is_null($firstOpenTime))) {
                            $close_time = rand(18, 21) . ':' . $minutesClose;
                        } else if ($i == 7 && $firstOpen && is_null($firstOpenTime)) {
                            $close_time = null;
                        } else {
                            $close_time = fake()->boolean() ? rand(18, 21) . ':' . $minutesClose : null; // 50% вероятность, что будет время закрытия
                        }
                    }
                    $bDay = $is_open;
                    $bDayClose = $close_time;
                    if ($i == 1) {
                        $firstOpen = $is_open;
                        $firstOpenTime = $open_time;
                    }
                    \Illuminate\Support\Facades\DB::table('shop_working_modes')->insert([
                        'shop_id' => $shop_id,
                        'day_of_week' => $day_of_week,
                        'is_open' => $is_open,
                        'open_time' => $open_time,
                        'close_time' => $close_time,
                    ]);
                }
            }
        });
    }

    private function seedShopPrices(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $shops = \App\Models\Shop::with('subCategories')->get();
            foreach ($shops as $shop) {
                foreach ($shop->subCategories as $subCategory) {
                    if (rand(0, 3)) {
                        \Illuminate\Support\Facades\DB::table('shop_prices')->updateOrInsert([
                            'shop_id' => $shop->id,
                            'category_id' => $subCategory->category_id,
                            'sub_category_id' => $subCategory->id,
                            'price' => rand(10, 50) . '000',
                        ]);
                    }
                }
            }
        });
    }

    private function seedShopChains(string $message): void
    {
        $this->executeWithLogging($message, function () {
            $chains = \App\Models\Chain::all();
            foreach ($chains as $chain) {
                for ($i = 0; $i < rand(5, 10); $i++) {
                    $shop = \App\Models\Shop::inRandomOrder()->first();
                    $check = \Illuminate\Support\Facades\DB::table('chain_shops')->where('shop_id', $shop->id)->first();
                    while ($check) {
                        $shop = \App\Models\Shop::inRandomOrder()->first();
                        $check = \Illuminate\Support\Facades\DB::table('chain_shops')->where('shop_id', $shop->id)->first();
                    }

                    \Illuminate\Support\Facades\DB::table('chain_shops')->insert([
                        'shop_id' => $shop->id,
                        'chain_id' => $chain->id
                    ]);
                }
            }
        });
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // SEED MAIN TABLES
        $this->seedModel(\App\Models\Region::class, 3, 'regions');
        $this->seedModel(\App\Models\City::class, 5, 'cities');
        $this->seedModel(\App\Models\Area::class, 30, 'area');
        $this->seedModel(\App\Models\Municipality::class, 40, 'municipalities');
        $this->seedModel(\App\Models\Subway::class, 100, 'subways');
        $this->seedCategoriesAndSubCategories('categories and subcategories');
        $this->seedModel(\App\Models\Chain::class, 100, 'chains');
        $this->seedServices('services');
        $this->seedModel(\App\Models\Shop::class, 200, 'shops');

        // SEED RELATIONS
        $this->seedShopSubways('shop subways');
        $this->seedShopServices('shop services');
        $this->seedShopCategories('shop categories');
        $this->seedShopSubCategories('shop subcategories');
        $this->seedShopWorkingMode('shop workingmode');
        $this->seedShopPrices('shop prices');
        // $this->seedShopChains('chain shops');
    }
}
