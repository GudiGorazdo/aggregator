<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function shops()
    {
        return $this->hasMany(\App\Models\Shop::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }
}
