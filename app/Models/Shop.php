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

    public function workingMode()
    {
        return $this->belongsTo(\App\Models\WorkingMode::class);
    }
}
