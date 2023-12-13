<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopWorkingMode extends Model
{
    public $timestamps = false;

    public function scopeGetByShopID(Builder $query, $id): Builder
    {
        return $query->where('shop_id', $id);
    }

    public function shops(): belongsTo
    {
        return $this->belongsTo(\App\Models\Shop::class);
    }
}
