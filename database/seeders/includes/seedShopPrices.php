<?php
function seedShopPrices(): void
{
    $shops = \App\Models\Shop::with('subCategories')->get();
    foreach ($shops as $shop) {
        foreach ($shop->subCategories as $subCategory) {
            if (rand(0, 3)) {
                \Illuminate\Support\Facades\DB::table('shop_prices')->updateOrInsert([
                    'shop_id' => $shop->id,
                    'category_id' => $subCategory->category_id,
                    'sub_category_id' => $subCategory->id,
                    'price' => rand(10, 50) . '000',
                ]);
            }
        }
    }
}
