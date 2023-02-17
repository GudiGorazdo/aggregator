<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subway extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function shops()
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }
}
