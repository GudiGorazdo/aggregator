<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipality extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $guarded = [];

    public function city(): BelongsTo
    {
        return $this->belongsTo(\App\Models\City::class);
    }
}


