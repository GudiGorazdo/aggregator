<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkingMode extends Model
{
    public $timestamps = false;

    public function shops(): belongsTo
    {
        return $this->belongsTo(\App\Models\Shops::class);
    }
}
