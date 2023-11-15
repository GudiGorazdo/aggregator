<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function scopeGetByCityID($query, int $id): Builder
    {
        return $query->where('city_id', $id);
    }

    public function scopeGetByCityIdWithSubways($query, int $id): Builder
    {
        return $query->with('subways')->where('city_id', $id);
    }

    public function shops(): HasMany
    {
        return $this->hasMany(\App\Models\Shop::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function subways(): HasMany
    {
        return $this->hasMany(\App\Models\Subway::class);
    }
}


