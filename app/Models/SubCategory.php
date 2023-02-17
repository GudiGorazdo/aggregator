<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function shops()
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }
}
