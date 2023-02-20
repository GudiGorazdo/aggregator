<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function scopeGetByCityId($query, $id)
    {
        return $query->where('city_id', $id);
    }

    public function shops()
    {
        return $this->hasMany(\App\Models\Shop::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function subways()
    {
        return $this->hasMany(\App\Models\Subway::class);
    }
}
