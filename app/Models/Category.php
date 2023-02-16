<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

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




    // GENERATE RANDOM DATA

    static function generate($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $category = new Category();
            $category->name = 'Категория_' . ($i + 1);
            $category->save();
        }
    }

    static function generateShopsCategories()
    {
        $shops = \App\Models\Shop::all();
        $categories = \App\Models\Category::all();

        for ($i = 0; $i < count($shops); $i++) {
            for($k = 1; $k < rand(1, 4); $k++) {
                try {
                    \Illuminate\Support\Facades\DB::table('category_shop')->insert([
                        'category_id' => $categories[rand(1, count($categories))]->id,
                        'shop_id' => $shops[$i]->id
                    ]);
                } catch (Exception $error) {
                    continue;
                }
            }
        }
    }
}
