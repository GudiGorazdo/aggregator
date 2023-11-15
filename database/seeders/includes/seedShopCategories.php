<?php
function seedShopCategories(): void
{
    $shops = \App\Models\Shop::all();
    foreach ($shops as $shop) {
        $ids = \App\Models\Category::inRandomOrder()->limit(rand(3, 15))->pluck('id');
        $ids && $shop->categories()->syncWithoutDetaching($ids);
    }
}
