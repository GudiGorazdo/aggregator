<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Builder;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function scopeGetByShopID(Builder $query, int $shopID): Builder
    {
        return $query->with('category')
            ->whereHas('shops', function ($query) use ($shopID) {
                $query->where('shops.id', $shopID);
            });
    }   public $timestamps = false;

    public function category(): belongsTo
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function shops(): belongsToMany
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }
}
