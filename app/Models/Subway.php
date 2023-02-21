<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Subway extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function scopeGetByAreasIds($query, $ids): Builder
    {
        return $query->whereIn('area_id', $ids);
    }

    public function shops(): belongsToMany
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }
}
