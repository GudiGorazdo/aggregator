<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipal extends Model
{
    public $timestamps = false;

    public function city(): BelongsTo
    {
        return $this->belongsTo(\App\Models\City::class);
    }
}


