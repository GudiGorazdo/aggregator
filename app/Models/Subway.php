<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subway extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function scopeGetByAreasIds($query, $ids)
    {
        return $query->whereIn('area_id', $ids);
    }

    public function shops()
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }
}
