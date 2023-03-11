<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Services\FilterService;
use App\Filters\SimilarCategoriesFilter;

class Shop extends Model
{
    public function getRouteKey()
    {
        return 'id';
    }

    public function scopeFilter(Builder $query): Builder
    {
        foreach (app(FilterService::class)->getFilters() as $filter) {
            $query = $filter->apply($query)
                ->with('workingMode')
                ->with('area')
                ->with('city')
                ->with('subways')
                ->with('subCategories')
            ;
        }
        return $query;
    }

    public function scopeSimilarFilter(Builder $query, int $city_id, int $shop_id, array $subCategories = []): Builder
    {
            $query = (new SimilarCategoriesFilter())->apply($query, $subCategories)
                ->with('area')
                ->with('city')
                ->with('categories')
                ->with('subCategories')
                ->with('subways')
                ->where('id', '!=',  $shop_id)
                ->where('city_id',  $city_id)
            ;
        return $query;
    }

    public function scopeGetById(Builder $query, string|int $id): Builder
    {
        return $query->where('id', $id)
            ->with('workingMode')
            ->with('area')
            ->with('city')
            ->with('categories')
            ->with('subCategories')
            ->with('services')
            ->with('prices')
        ;
    }

    public function scopeGetByName(Builder $query, string $name): Builder
    {
        return $query->select('name', 'id')
            ->where('name', 'LIKE', '%'.$name.'%')
        ;
    }

    public function working(): belongsTo
    {
        return $this->belongsTo(\App\Models\City::class);
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

    public function workingMode(): hasMany
    {
        return $this->hasMany(\App\Models\ShopWorkingMode::class);
    }

    public function prices(): hasMany
    {
        return $this->hasMany(\App\Models\ShopPrices::class);
    }

    public function services(): belongsToMany
    {
        return $this->belongsToMany(\App\Models\Service::class)
            ->withPivot('rating')
            ->withPivot('comments')
        ;
    }
}
