<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

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




    // GENERATE RANDOM DATA
    static function generate($n)
    {
        $categories = \App\Models\Category::all();
        for ($i = 0; $i < $n; $i++) {
            $subCat = new SubCategory();
            $subCat->name = ($i + 1) . '_подкатегория';
            $subCat->category_id = $categories[rand(0, count($categories) - 1)]->id;
            $subCat->save();
        }
    }

    static function generateShopsSubCategories()
    {
        $shops = \App\Models\Shop::all();
        $subCategories = \App\Models\Category::all();

        for ($i = 0; $i < count($shops); $i++) {
            for($k = 1; $k < rand(1, 4); $k++) {
                try {
                    \Illuminate\Support\Facades\DB::table('shop_sub_category')->insert([
                        'sub_category_id' => $subCategories[rand(1, count($subCategories))]->id,
                        'shop_id' => $shops[$i]->id
                    ]);
                } catch (Exception $error) {
                    continue;
                }
            }
        }
    }
}
