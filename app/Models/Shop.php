<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function area()
    {
        return $this->belongsTo(\App\Models\Area::class);
    }

    public function subways()
    {
        return $this->belongsToMany(\App\Models\Subway::class);
    }

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }

    public function subCategories()
    {
        return $this->belongsToMany(\App\Models\SubCategory::class);
    }





    // GENERATE RANDOM DATA

    static function generate($n)
    {
        $cities = \App\Models\City::all();
        $areas = \App\Models\Area::all();

        for ($i = 0; $i < $n; $i++) {
            $shop = new Shop();
            $shop->city_id = $cities[rand(1, count($cities))]->id;
            $shop->area_id = $areas[rand(1, count($areas))]->id;
            $shop->logo =  'LOGO_' . ($i + 1);
            $shop->photo = 'https://picsum.photos/';
            $shop->title = 'Title_' . ($i + 1);
            $shop->title = 'Name_' . ($i + 1);
            $shop->descriprtion = $shop->generateDesc();
            $shop->zip = rand(100000, 999999);
            $shop->coord = json_encode(array(
                'lat' => 0,
                'long' => 0
            ));


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
            $shop->working_mode = json_encode(array(
                'sunday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
                'monday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
                'tuesday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
                'wednesday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
                'thursday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
                'friday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
                'saturday' => [ 'open' => rand(8, 12), 'closed' => rand(18, 22), ],
            ));
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
            $shop->average_rating = array_sum($ratingArray) / count($ratingArray);

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
                    $comments[$s][$i]['text'] = $shop->generateDesc();
                    $comments[$s][$i]['response'] = [];
                    for($k=0; $k < rand(0, 7); $k++) {
                        $response[$k]['name'] = 'name_' . ($k + 1);
                        $response[$k]['date'] = date('Y-m-d', mt_rand(1, time()));
                        $response[$k]['rating'] = rand(11, 50) / 10;
                        $response[$k]['text'] = $shop->generateDesc();

                    }
                }
            }

            $shop->yandex_comments = json_encode($comments['yandex_comments']);
            $shop->google_comments = json_encode($comments['google_comments']);
            $shop->gis_comments = json_encode($comments['gis_comments']);
            $shop->avito_comments = json_encode($comments['avito_comments']);

            $shop->save();
        }
    }

    private function generateDesc()
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
}
