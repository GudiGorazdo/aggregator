<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function scopeGetAll($query, $order = ['by' => 'name', 'sort'=>'desc'])
    {
        return $query->orderBy($order['by'], $order['sort']);
    }

    public function shops(): HasMany
    {
        return $this->hasMany(\App\Models\Shop::class);
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
