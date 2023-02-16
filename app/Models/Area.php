<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function shops()
    {
        return $this->hasMany(\App\Models\Shop::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }










    // GENERATE RANDOM DATA

    static function generate($n)
    {
        $cities = \App\Models\City::all();
        for ($i = 0; $i < $n; $i++) {
            $area = new Area();
            $area->name = ($i + 1) . '_Район';
            $area->city_id = $cities[rand(1, count($cities))]->id;
            $area->save();
        }
    }
}
