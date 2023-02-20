<?php
namespace App\Services;

use Exception;

class GenerateRandomData
{
    private static function generate($n, $model, $name)
    {
        for ($i = 0; $i < $n; $i++) {
            $m = new $model();
            $m->name = $name . '_' . ($i + 1);
            $m->save();
        }
    }

    private static function generateArea($city_id)
    {
        $arr = [];
        for ($i = 0; $i < rand(3, 10); $i++) {
            $area = new \App\Models\Area();
            $area->name = ($i + 1) . '_Район_город_' . $city_id;
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
        $r = rand(0, 3);

        $arr = [];
        for ($i = 0; $i < $r; $i++) {
            $subway = new \App\Models\Subway();
            $subway->name = 'Метро_' . ($i + 1) . 'район_' . $area_id . 'город_' . $city_id;
            $subway->city_id = $city_id;
            $subway->area_id = $area_id;
            try {
                $subway->save();
            } catch (Exception $error) {
                continue;
            }
            $arr[] = $subway->id;
        }

        return $arr;
    }

    public static function generateWorkingMode($shop_id)
    {
        $mode = new \App\Models\WorkingMode();
        $mode->shop_id = $shop_id;
        $mode->monday_open = (string) rand(8, 12);
        $mode->monday_close = (string) rand(18, 22);
        $mode->tuesday_open = (string) rand(8, 12);
        $mode->tuesday_close = (string) rand(18, 22);
        $mode->wednesday_open = (string) rand(8, 12);
        $mode->wednesday_close = (string) rand(18, 22);
        $mode->thursday_open = (string) rand(8, 12);
        $mode->thursday_close = (string) rand(18, 22);
        $mode->friday_open = (string) rand(8, 12);
        $mode->friday_close = (string) rand(18, 22);
        $mode->saturday_open = (string) rand(8, 12);
        $mode->saturday_close = (string) rand(18, 22);
        $mode->sunday_open = (string) rand(8, 12);
        $mode->sunday_close = (string) rand(18, 22);
        try {
            $mode->save();
        } catch (Exception $error) {
         }
    }

    private static function generateShop($n, $city_id, $area_id)
    {
        $desc = self::generateDesc();

        $arr = [];

        for ($i = 0; $i < $n; $i++) {
            $shop = new \App\Models\Shop();
            $shop->city_id = $city_id;
            $shop->area_id = $area_id;
            $shop->logo =  'LOGO_' .rand(100000, 999999);
            $shop->photo = 'https://picsum.photos/';
            $shop->title = 'Title_' .rand(100000, 999999);
            $shop->name = 'Name_' .rand(100000, 999999);
            $shop->address = 'Улица_' .rand(1000, 9999) . ' д. ' . rand(10, 99);
            $shop->description = $desc;
            $shop->zip = rand(100000, 999999);
            $shop->coord = json_encode(array(
                'lat' => 0,
                'long' => 0
            ));


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
                    for($k=0; $k < rand(0, 7); $k++) {
                        $response[$k]['name'] = 'name_' . ($k + 1);
                        $response[$k]['date'] = date('Y-m-d', mt_rand(1, time()));
                        $response[$k]['rating'] = rand(11, 50) / 10;
                        $response[$k]['text'] = $desc;

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

            self::generateWorkingMode($shop->id);

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


    private static function generateShopCategory($category_id, $shop_id)
    {
        try {
            \Illuminate\Support\Facades\DB::table('category_shop')->insert([
                'category_id' => $category_id,
                'shop_id' => $shop_id
            ]);
        } catch (Exception $error) {

        }
    }

    private static function generateSubCategories($category_id)
    {
        $arr = [];
        for ($i = 0; $i < rand(3, 9); $i++) {
            $area = new \App\Models\SubCategory();
            $area->name = ($i + 1) . '_подкатегория_' . $category_id . '_категория';
            $area->category_id = $category_id;
            try {
                $area->save();
            } catch (Exception $error) {
                continue;
            }
            $arr[] = $area->id;
        }
        return $arr;
    }

    private static function generateShopSubCategory($category_id, $shop_id)
    {
        try {
            \Illuminate\Support\Facades\DB::table('shop_sub_category')->insert([
                'sub_category_id' => $category_id,
                'shop_id' => $shop_id
            ]);
        } catch (Exception $error) {

        }
    }

    private static function generateShopsWithSubways($city_id, $areas_arr, $b)
    {
        foreach($areas_arr as $area) {
            $shop_ids = self::generateShop(rand(0, 2), $city_id, $area);
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
        for ($i = 0; $i<4;$i++) {
            self::generateShopCategory($category_id, $shop_id);
        }
        $sub_arr = self::generateSubCategories($category_id);
        foreach($sub_arr as $sub) {
            for ($i = 0; $i<7;$i++) {
                self::generateShopSubCategory($sub, $shop_id);
            }
        }
    }

    public static function generateRandomData()
    {
        self::generate(25, \App\Models\City::class, 'Город');
        self::generate(5, \App\Models\Category::class, 'Категория');
        $cities = \App\Models\City::all();

        $b = 0;
        foreach($cities as $city) {
            $areas_arr = self::generateArea($city->id);
            self::generateShopsWithSubways($city->id, $areas_arr, $b);
            $b++;
        }

        $shops = \App\Models\Shop::all();
        $categories = \App\Models\City::all();

        foreach($categories as $category) {
            self::generateShopCategoriesAndSubCategories($category->id, $shops[rand(0, count($shops) - 1)]->id);
        }
    }
}
