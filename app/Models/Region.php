<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    public $timestamps = false;

    public function cities(): HasMany
    {
        return $this->hasMany(\App\Models\City::class);
    }
}


