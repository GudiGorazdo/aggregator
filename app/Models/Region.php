<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Region extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeFull(Builder $query): Builder
    {
        return $query->with('cities.areas.subways');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(\App\Models\City::class);
    }

    public function areas(): HasMany
    {
        return $this->hasMany(\App\Models\Area::class);
    }

    public function subways(): HasMany
    {
        return $this->hasMany(\App\Models\Subway::class);
    }
}


