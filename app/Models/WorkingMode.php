<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingMode extends Model
{
    public $timestamps = false;

    public function shops()
    {
        return $this->belongsTo(\App\Models\Shops::class);
    }
}
