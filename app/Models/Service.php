<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function scopeGetShopService(Builder $query, int $service_id, int $shop_id)
    {
        return $query->where('id', $service_id)->whereHas('shops', function (Builder $query) use ($shop_id) {
            return $query->where('id', $shop_id);
        })->get();
        //return $query->where('id', $service_id)->with('shops')->get();
    }

    public function shops(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Shop::class, 'shop_service');
    }
}


