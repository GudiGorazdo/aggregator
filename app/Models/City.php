<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function scopeGetAll($query, $order = ['by' => 'name', 'sort'=>'desc'])
    {
        return $query->orderBy($order['by'], $order['sort']);
    }

    public function shops()
    {
        return $this->hasMany(\App\Models\Shop::class);
    }

    public function areas()
    {
        return $this->hasMany(\App\Models\Area::class);
    }
}
