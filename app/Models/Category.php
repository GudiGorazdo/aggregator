<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function subCategories(): HasMany
    {
        return $this->hasMany(\App\Models\SubCategory::class);
    }

    public function shops(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Shop::class, 'shop_category');
    }
}
