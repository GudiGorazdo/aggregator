<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function city()
    {
        return $this->hasOne(\App\Models\City::class);
    }

    public function area()
    {
        return $this->hasOne(\App\Models\Area::class);
    }

    public function subway()
    {
        return $this->hasMany(\App\Models\Subway::class);
    }
}
