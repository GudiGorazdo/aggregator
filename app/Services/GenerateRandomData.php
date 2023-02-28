<?php
namespace App\Services;

use Faker\Factory;

use Exception;

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
                $m->coord = json_encode(array(
                    'lat' => $faker->latitude(47, 65),
                    'long' => $faker->longitude(30, 100)
                ));
            }
            $m->save();
        }
    }

    private static function generateArea($city_id)
    {
        $arr = [];
        for ($i = 0; $i < rand(5, 15); $i++) {
            $area = new \App\Models\Area();
            $area->name = ($i + 1) . '_Район';
            $area->name_for_title =   ($i + 1) . 'м';
            $area->city_id = $city_id;
            try {
                $area->save();
            } catch (Exception $error) {
                continue;
            }
            $arr[] = $area->id;
        }
        return $arr;
    }

    private static function generateSubway($city_id, $area_id)
    {
        $r = rand(0, 7);

        $arr = [];
        for ($i = 0; $i < $r; $i++) {
            $subway = new \App\Models\Subway();
            $area = \App\Models\Area::where('id', $area_id)->first();
            $subway->name = ($i + 1) . '_Метро__' . $area->name;
            $subway->city_id = $city_id;
            $subway->area_id = $area_id;
            $subway->save();
            $arr[] = $subway->id;
        }

        return $arr;
    }

    public static function generateWorkingMode($shop_id, $convience)
    {
        $days = [ 'monday', 'tuesday', 'monday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', ];
        $mode = new \App\Models\WorkingMode();
        $mode->shop_id = $shop_id;
        foreach ($days as $day) {
            if ($convience) {
                if (rand(0, 4)) {
                    $mode[$day . '_open'] = 24;
                    $mode[$day . '_close'] = 0;
                    continue;
                }
                continue;
            }
            if (rand(0, 4)) {
                $mode[$day . '_open'] = rand(8, 12);
                $mode[$day . '_close'] = rand(18, 22);
            }
        }
        try {
            $mode->save();
        } catch (Exception $error) {
         }
    }

    private static function generateShop($n, $city_id, $area_id, $faker, $city_coord)
    {
        $desc = self::generateDesc();

        $arr = [];

        for ($i = 0; $i < $n; $i++) {
            $shop = new \App\Models\Shop();
            $shop->city_id = $city_id;
            $shop->area_id = $area_id;
            $shop->logo =  'https://picsum.photos/';
            $shop->title = 'Title_' .rand(100000, 999999);
            $shop->name = 'Name_' .rand(100000, 999999);
            $shop->address = 'Улица_' .rand(1000, 9999) . ' д. ' . rand(10, 99);
            $shop->description = $desc;
            $shop->zip = rand(100000, 999999);
            $city = json_decode($city_coord);
            $latMin = (int)$city->lat - (125/1000);
            $latMax = (int)$city->lat + (125/1000);
            $longMin = (int)$city->long - (125/1000);
            $longMax = (int)$city->long + (125/1000);
            // dd($latMin, $latMax, $longMin, $longMax);
            $shop->coord = json_encode(array(
                'lat' => $faker->latitude($latMin, $latMax ),
                'long' => $faker->longitude($longMin, $longMax)
            ));

            $photos = [];
            for($i = 0; $i < rand(1, 30); $i++) {
                $photos[] = 'https://picsum.photos/';
            }

            $shop->photos = json_encode($photos);

            $additionalPhones = NULL;
            $shop->phone = rand(1000000, 9999999);
            for($i=0; $i < rand(0, 7); $i++) {
                $additionalPhones[] = rand(1000000, 9999999);
            }
            if ($additionalPhones) {
                $shop->additional_phones = json_encode($additionalPhones);
            }

            $shop->whatsapp = '#';
            $shop->telegram = '#';
            $shop->vk = '#';
            $shop->web = '#';
            $moreSocials = NULL;
            for($i=0; $i < rand(0, 7); $i++) {
                $moreSocials['name_' . ($i + 1)] = '#';
            }
            if ($moreSocials) {
                $shop->more_socials = json_encode($moreSocials);
            }

            for($i=0; $i < rand(1, 3); $i++) {
                $emails[] = '#';
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
            $shop->yandex_rating = $ratingArray[0];
            $shop->google_rating = $ratingArray[1];
            $shop->gis_rating = $ratingArray[2];
            $shop->avito_rating = $ratingArray[3];
            $shop->average_rating = number_format(array_sum($ratingArray) / count($ratingArray), 1, '.');

            $comments = [];
            $services = [
                'yandex_comments',
                'google_comments',
                'gis_comments',
                'avito_comments',
            ];

            foreach ($services as $s) {
                for($i=0; $i < rand(1, 7); $i++) {
                    $comments[$s][$i]['name'] = 'name_' . ($i + 1);
                    $comments[$s][$i]['date'] = date('Y-m-d', mt_rand(1, time()));
                    $comments[$s][$i]['rating'] = rand(11, 50) / 10;
                    $comments[$s][$i]['text'] = $desc;
                    $comments[$s][$i]['response'] = [];
                    for($k=0; $k < rand(1, 7); $k++) {
                        $comments[$s][$i]['response'][$k]['name'] = 'name_' . ($k + 1);
                        $comments[$s][$i]['response'][$k]['date'] = date('Y-m-d', mt_rand(1, time()));
                        $comments[$s][$i]['response'][$k]['rating'] = rand(11, 50) / 10;
                        $comments[$s][$i]['response'][$k]['text'] = $desc;

                    }
                }
            }

            $shop->yandex_comments = json_encode($comments['yandex_comments']);
            $shop->google_comments = json_encode($comments['google_comments']);
            $shop->gis_comments = json_encode($comments['gis_comments']);
            $shop->avito_comments = json_encode($comments['avito_comments']);

            try {
                $shop->save();
            } catch (Exception $error) {
                continue;
            }

            self::generateWorkingMode($shop->id, !!$shop->convenience_shop);

            $arr[] = $shop->id;
        }

        return $arr;
    }

    private static function generateDesc()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://asdfast.beobit.net/api/?&length=1&count=1",
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return json_decode($response)->text;
        }
    }

    private static function generateShopSubways($shop_id, $subway_arr)
    {
        foreach($subway_arr as $subway) {
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


    // private static function generateShopCategory($category_id, $shop_id)
    // {
    //     try {
    //         \Illuminate\Support\Facades\DB::table('category_shop')->insert([
    //             'category_id' => $category_id,
    //             'shop_id' => $shop_id
    //         ]);
    //     } catch (Exception $error) {

    //     }
    // }

    private static function generateSubCategories($category_id)
    {
        $arr = [];
        for ($i = 0; $i < rand(3, 9); $i++) {
            $sub_category = new \App\Models\SubCategory();
            $sub_category->name = ($i + 1) . '_подкатегория_' . $category_id . '_категория';
            $sub_category->category_id = $category_id;
            $sub_category->save();
            $arr[] = $sub_category->id;
        }
        return $arr;
    }

    private static function generateShopSubCategory($category_id, $shop_id)
    {
        \Illuminate\Support\Facades\DB::table('shop_sub_category')->insert([
            'sub_category_id' => $category_id,
            'shop_id' => $shop_id
        ]);
    }

    private static function generateShopsWithSubways($city_id, $areas_arr, $b, $faker, $city_coord)
    {
        foreach($areas_arr as $area) {
            $shop_ids = self::generateShop(rand(1, 5), $city_id, $area, $faker, $city_coord);
            if ($b < 5) {
                $subway_ids = self::generateSubway($city_id, $area);
                foreach($shop_ids as $shop) {
                    self::generateShopSubways($shop, $subway_ids);
                }
            }
        }
    }

    private static function generateShopCategoriesAndSubCategories($category_id, $shop_id)
    {
        // for ($i = 0; $i<4;$i++) {
        //     self::generateShopCategory($category_id, $shop_id);
        // }
        $sub_arr = self::generateSubCategories($category_id);
        // foreach($sub_arr as $sub) {
        //     for ($i = 0; $i<7;$i++) {
        //         self::generateShopSubCategory($sub, $shop_id);
        //     }
        // }
    }

    public static function generateRandomAdminUser()
    {
        $user = new \App\Models\AdminUser();
        $user->login = 'admin';
        $user->password = bcrypt('admin666');
        $user->save();
    }

    public static function generateRandomData()
    {
        $faker = Factory::create();

        self::generate(10, \App\Models\City::class, 'Город', 'городе', true, $faker);
        self::generate(5, \App\Models\Category::class, 'Категория', 'категории');
        $cities = \App\Models\City::all();

        $b = 0;
        foreach($cities as $city) {
            $areas_arr = self::generateArea($city->id);
            self::generateShopsWithSubways($city->id, $areas_arr, $b, $faker, $city->coord);
            $b++;
        }

        $shops = \App\Models\Shop::all();
        $categories = \App\Models\Category::all();

        foreach($categories as $category) {
            self::generateSubCategories($category->id);
            // self::generateShopCategoriesAndSubCategories($category->id, '$shop->id');
        }

        $sub_categories = \App\Models\SubCategory::all();
        // dd(count($sub_categories));


        foreach($shops as $shop) {
            foreach($sub_categories as $c) {
                if (rand(0, 3) > 0) {
                    self::generateShopSubCategory($c->id, $shop->id);
                }
            }
        }


        self::generateRandomAdminUser();
    }
}
