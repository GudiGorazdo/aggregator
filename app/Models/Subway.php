<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Subway extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function shops()
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }






    // GENERATE RANDOM DATA

    static function generateShopsSubways()
    {
        $shops = \App\Models\Shop::all();
        $subways = \App\Models\Subway::all();

        for ($i = 0; $i < count($shops); $i++) {
            for($k = 1; $k < rand(1, 4); $k++) {
                try {
                    \Illuminate\Support\Facades\DB::table('shop_subway')->insert([
                        'subway_id' => $subways[rand(1, count($subways))]->id,
                        'shop_id' => $shops[$i]->id
                    ]);
                } catch (Exception $error) {
                    continue;
                }
            }
        }
    }

    static function generate($n)
    {
        $cities = \App\Models\City::all();
        $areas = \App\Models\Area::all();

        for ($i = 0; $i < $n; $i++) {
            $subway = new Subway();
            $subway->name = 'Метро_' . ($i + 1);
            $subway->city_id = $cities[rand(1, count($cities))]->id;
            $subway->area_id = $areas[rand(1, count($areas))]->id;
            $subway->save();
        }
    }
}
