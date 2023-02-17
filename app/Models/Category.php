<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function subCategories()
    {
        return $this->hasMany(\App\Models\SubCategory::class);
    }

    public function shops()
    {
        return $this->belongsToMany(\App\Models\Shop::class);
    }
}
