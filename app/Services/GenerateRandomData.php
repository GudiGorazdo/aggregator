<?php

namespace App\Services;

use Faker\Factory;

use Exception;
use Illuminate\Support\Carbon;

class GenerateRandomData
{
    private static function getTimeZone()
    {
        $arr = [-1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        return $arr[rand(0, count($arr) - 1)];
    }

    private static function generate($n, $model, $name, $name_for_title = false, $timezone = false, bool|object $faker = null)
    {
        for ($i = 0; $i < $n; $i++) {
            $m = new $model();
            $m->name = $name . '_' . ($i + 1);
            if ($name_for_title) {
                $m->name_for_title = $name_for_title . '_' . ($i + 1);
            }
            if ($timezone) {
                $m->timezone = self::getTimeZone();
            }
            $m->save();
        }
    }

    private static function generateCity($regionID, $regionName, $faker)
    {
        $m = new \App\Models\City();
        for ($i = 0; $i < 5; $i++) {
            $m = new \App\Models\City();
            $m->name = 'Город' . '_' . ($i + 1) . '_' . $regionName;
            $m->region_id = $regionID;
            $m->name_for_title = 'Городе' . '_' . ($i + 1);
            $m->coord = json_encode(array(
                'lat' => $faker->latitude(47, 65),
                'long' => $faker->longitude(30, 100)
            ));
            $m->save();
        }
    }

    private static function generateMunicipalities($area, $i)
    {
        $m = new \App\Models\Municipality();
        $m->name = 'Муниципальный округ' . '_' . ($i + 1);
        $m->region_id = $area->region_id;
        $m->city_id = $area->city_id;
        $m->area_id = $area->id;
        $m->save();
    }

    private static function generateArea($cityID, $region_id, $i)
    {
        $area = new \App\Models\Area();
        $area->name = ($i + 1) . '_Район';
        $area->name_for_title =   ($i + 1) . 'м';
        $area->city_id = $cityID;
        $area->region_id = $region_id;
        try {
            $area->save();
        } catch (Exception $error) {
            // continue;
        }
        $arr[] = $area->id;
    }

    private static function generateSubway($area, $i)
    {
        if (in_array($area->city_id, [12, 13, 14, 15])) return;
        $subway = new \App\Models\Subway();
        $subway->name = ($i + 1) . '_Метро__' . $area->name;
        $subway->city_id = $area->city_id;
        $subway->area_id = $area->id;
        $subway->save();
        $arr[] = $subway->id;
        $arr = [];

        return $arr;
    }

    public static function generateWorkingMode($shop_id, $faker, $convience)
    {
        $firstOpen = false;
        $firstOpenTime = null;

        $nextDay = $faker->boolean(80); // 80% вероятность, что открыто
        $bDay = false;
        $bDayClose = false;

        for ($i = 1; $i <= 7; $i++) {
            $shop_id = $shop_id;
            $day_of_week = $i;
            $is_open = $nextDay;
            if ($i == 7) $nextDay = false;
            else $nextDay = $faker->boolean(80);
            $minutesOpen = $faker->boolean() ? '30' : '00';
            $minutesClose = $faker->boolean() ? '30' : '00';
            if ($convience) {
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
                    $open_time = $faker->boolean() ? rand(8, 12) . ':' . $minutesOpen : null; // 50% вероятность, что будет время открытия
                }
                if (!$nextDay || ($i == 7 && $firstOpen && !is_null($firstOpenTime))) {
                    $close_time = rand(18, 21) . ':' . $minutesClose;
                } else if ($i == 7 && $firstOpen && is_null($firstOpenTime)) {
                    $close_time = null;
                } else {
                    $close_time = $faker->boolean() ? rand(18, 21) . ':' . $minutesClose : null; // 50% вероятность, что будет время закрытия
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

    private static function generateShop($area, $faker)
    {
        $subways = \App\Models\Subway::where('area_id', $area->id)->first();
        $city = \App\Models\City::find($area->city_id);
        for ($i = 0; $i < rand(3, 7); $i++) {
            $shop = new \App\Models\Shop();
            $shop->city_id = $area->city_id;
            $shop->region_id = $area->region_id;
            $shop->area_id = $area->id;
            $shop->logo =  'https://picsum.photos/';
            $shop->title = 'Title_' . rand(100000, 999999);
            $shop->name = 'Name_' . rand(100000, 999999);
            $shop->address = 'Улица_' . rand(1000, 9999) . ' д. ' . rand(10, 99);
            $shop->description = implode('', $faker->paragraphs());
            $shop->zip = rand(100000, 999999);
            $city_c = json_decode($city->coord);
            $latMin = (int)$city_c->lat - (125 / 1000);
            $latMax = (int)$city_c->lat + (125 / 1000);
            $longMin = (int)$city_c->long - (125 / 1000);
            $longMax = (int)$city_c->long + (125 / 1000);
            $shop->coord = json_encode(array(
                'lat' => $faker->latitude($latMin, $latMax),
                'long' => $faker->longitude($longMin, $longMax)
            ));

            $photos = [];
            for ($i = 0; $i < rand(10, 30); $i++) {
                $photos[] = ['name' => 'https://picsum.photos/', 'sizes' => []];
            }

            $shop->photos = json_encode($photos);

            $additionalPhones = [];
            $shop->phone = $faker->phoneNumber();
            for ($i = 0; $i < rand(0, 7); $i++) {
                $additionalPhones[] = $faker->phoneNumber();
            }
            if ($additionalPhones) {
                $shop->additional_phones = json_encode($additionalPhones);
            }

            $shop->whatsapp = $faker->phoneNumber();
            $shop->telegram = $faker->phoneNumber();
            $shop->vk = $faker->phoneNumber();
            $web = [];
            for ($i = 0; $i < rand(1, 5); $i++) {
                $web[] = $faker->safeEmailDomain();
            }
            $shop->web = json_encode($web);
            $moreSocials = [];
            for ($i = 0; $i < rand(0, 7); $i++) {
                $moreSocials['name_' . ($i + 1)] = '#';
            }
            if ($moreSocials) {
                $shop->more_socials = json_encode($moreSocials);
            }

            for ($i = 0; $i < rand(1, 3); $i++) {
                $emails[] = $faker->email();
            }
            $shop->emails = json_encode($emails);

            $shop->convenience_shop = rand(0, 1);
            $shop->appraisal_online = rand(0, 1);
            $shop->pawnshop = rand(0, 1);
            $ratingArray = array(
                rand(11, 50) / 10,
                rand(11, 50) / 10,
                rand(11, 50) / 10,
                rand(11, 50) / 10,
            );

            $shop->average_rating = number_format(array_sum($ratingArray) / count($ratingArray), 1, '.');

            $shop->save();

            $comments = [];
            $services = [
                'yandex_comments',
                'google_comments',
                'gis_comments',
                'avito_comments',
            ];

            foreach ($services as $s) {
                for ($i = 0; $i < rand(1, 7); $i++) {
                    $comments[$s][$i]['name'] = 'name_' . ($i + 1);
                    $comments[$s][$i]['date'] = date('Y-m-d', mt_rand(1, time()));
                    $comments[$s][$i]['rating'] = rand(11, 50) / 10;
                    $comments[$s][$i]['text'] = implode('', $faker->paragraphs());
                    $comments[$s][$i]['response'] = [];
                    if (rand(0, 1) > 0) {
                        $comments[$s][$i]['response']['name'] = 'name';
                        $comments[$s][$i]['response']['date'] = date('Y-m-d', mt_rand(1, time()));
                        $comments[$s][$i]['response']['rating'] = rand(11, 50) / 10;
                        $comments[$s][$i]['response']['text'] = implode('', $faker->paragraphs());
                    }
                }
            }

            $shop->yandex_comments = json_encode($comments['yandex_comments']);
            $shop->google_comments = json_encode($comments['google_comments']);
            $shop->gis_comments = json_encode($comments['gis_comments']);
            $shop->avito_comments = json_encode($comments['avito_comments']);

            for ($i = 0; $i < 4; $i++) {
                \Illuminate\Support\Facades\DB::table('shop_service')->insert([
                    'shop_id' => $shop->id,
                    'service_id' => $i + 1,
                    'service_shop_id' => $faker->uuid(),
                    'rating' => $ratingArray[$i],
                    'rating_count' => rand(10, 100),
                    'link' => '#',
                    'comments' => json_encode($comments[$services[$i]]),
                ]);
            }

            rand(0, 3) > 0 && $subways && self::generateShopSubways($shop->id, $subways->pluck('id'));
            self::generateWorkingMode($shop->id, $faker, $shop->convenience_shop);
        }
    }

    private static function generateShopSubways($shop_id, $subway_arr)
    {
        foreach ($subway_arr as $subway) {
            if (rand(0, 5) > 3) {
                try {
                    \Illuminate\Support\Facades\DB::table('shop_subway')->insert([
                        'subway_id' => $subway,
                        'shop_id' => $shop_id
                    ]);
                } catch (Exception $error) {
                    continue;
                }
            }
        }
    }


    private static function generateSubCategory($category_id, $i)
    {
        $sub_category = new \App\Models\SubCategory();
        $sub_category->name = ($i + 1) . '_подкатегория';
        $sub_category->category_id = $category_id;
        $sub_category->save();
    }

    private static function generateShopSubCategory($category_id, $shop_id)
    {
        \Illuminate\Support\Facades\DB::table('shop_sub_category')->insert([
            'sub_category_id' => $category_id,
            'shop_id' => $shop_id
        ]);
    }

    public static function generateRandomAdminUser()
    {
        $user = new \App\Models\AdminUser();
        $user->login = 'admin';
        $user->password = bcrypt('admin666');
        $user->save();
    }

    public static function generateShopPrices($shop_id, $category_id, $sub_category_id)
    {
        if (rand(0, 3)) {
            \Illuminate\Support\Facades\DB::table('shop_prices')->updateOrInsert([
                'shop_id' => $shop_id,
                'category_id' => $category_id,
                'sub_category_id' => $sub_category_id,
                'price' => rand(10, 50) . '000',
            ]);
        }
    }

    public static function generateChains($faker)
    {
        for ($i = 0; $i < rand(10, 20); $i++) {
            $c = new \App\Models\Chain();
            $c->name = $faker->words(3, true);
            $c->save();
        }

        $chains = \App\Models\Chain::all();
        foreach ($chains as $chain) {
            for ($i = 0; $i < rand(5, 10); $i++) {
                $shop = \App\Models\Shop::inRandomOrder()->first();
                $check = \Illuminate\Support\Facades\DB::table('chain_shop')->where('shop_id', $shop->id)->first();
                while ($check) {
                    $shop = \App\Models\Shop::inRandomOrder()->first();
                    $check = \Illuminate\Support\Facades\DB::table('chain_shop')->where('shop_id', $shop->id)->first();
                }

                \Illuminate\Support\Facades\DB::table('chain_shop')->insert([
                    'shop_id' => $shop->id,
                    'chain_id' => $chain->id
                ]);
            }
        }
    }

    public static function start()
    {
        $faker = Factory::create();

        $services = [
            ['Яндекс карты', 'yandex-logo.svg'],
            ['Google maps', 'google-maps-logo.svg'],
            ['2Gis', '2gis-logo.svg'],
            ['Авито', 'avito-logo.svg']
        ];
        foreach ($services as $s) {
            \Illuminate\Support\Facades\DB::table('services')->insert([
                'name' => $s[0],
                'logo' => $s[1],
            ]);
        }

        self::generate(3, \App\Models\Region::class, 'Регион', false, true, $faker);
        $regions = \App\Models\Region::all();
        foreach ($regions as $region) {
            self::generateCity($region->id, $region->name, $faker);
        }
        self::generate(15, \App\Models\Category::class, 'Категория', 'категории');

        $cities = \App\Models\City::all()->shuffle();
        $b = 0;
        for ($i = 0; $i < rand(5, 15); $i++) {
            foreach ($cities as $city) {
                self::generateArea($city->id, $city->region_id, $i);
            }
            $cities->shuffle();
        }

        $areas = \App\Models\Area::all()->shuffle();
        foreach ($areas as $area) {
            for ($i = 0; $i < rand(1, 2); $i++) {
                self::generateMunicipalities($area, $i);
            }
        }

        $areas->shuffle();
        for ($i = 0; $i < 5; $i++) {
            foreach ($areas as $area) {
                self::generateSubway($area, $i);
            }
            $areas->shuffle();
        }

        $areas->shuffle();
        foreach ($areas as $area) {
            if (rand(0, 5) > 4) continue;
            self::generateShop($area, $faker);
        }

        self::generateChains($faker);

        $shops = \App\Models\Shop::all()->shuffle();
        $categories = \App\Models\Category::all()->shuffle();

        for ($i = 0; $i < rand(5, 10); $i++) {
            foreach ($categories as $category) {
                self::generateSubCategory($category->id, $i);
            }
            $categories->shuffle();
        }

        foreach ($shops as $shop) {

            for ($i = 0; $i < rand(5, 10); $i++) {
                $c = \App\Models\SubCategory::inRandomOrder()->first();
                try {
                    self::generateShopSubCategory($c->id, $shop->id);
                    $category = $categories->find($c->category_id);
                    \Illuminate\Support\Facades\DB::table('shop_category')->updateOrInsert([
                        'category_id' => $category->id,
                        'shop_id' => $shop->id
                    ]);
                } catch (Exception $error) {
                    // continue;
                }
                $c = null;
            }
        }

        // self::generateRandomAdminUser();
    }
}
