<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Services\FilterService;

class Shop extends Model
{
    protected $appends = ['now_rating'];

    public function getRouteKey()
    {
        return 'id';
    }

    public function getNowRatingAttribute(): string
    {
        return number_format(($this->attributes['yandex_rating']
                + $this->attributes['google_rating']
                + $this->attributes['gis_rating']
                + $this->attributes['avito_rating']
            ) / 4, 1, '.');
    }

    public function scopeFilter(Builder $query): Builder
    {
        foreach (app(FilterService::class)->getFilters() as $filter) {
            $query = $filter->apply($query);
        }
        return $query;
    }

    public function city(): belongsTo
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function area(): belongsTo
    {
        return $this->belongsTo(\App\Models\Area::class);
    }

    public function subways(): belongsToMany
    {
        return $this->belongsToMany(\App\Models\Subway::class);
    }

    public function categories(): belongsToMany
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }

    public function subCategories(): belongsToMany
    {
        return $this->belongsToMany(\App\Models\SubCategory::class);
    }

    public function workingMode(): hasOne
    {
        return $this->hasOne(\App\Models\WorkingMode::class);
    }
}
