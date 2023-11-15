<?php
function seedShopSubways(): void
{
    $shops = \App\Models\Shop::all();
    foreach ($shops as $shop) {
        if (rand(0, 7) > 5) continue;
        $ids = \App\Models\Subway::where('area_id', $shop->area_id)->inRandomOrder()->limit(rand(1, 3))->pluck('id');
        $ids && $shop->subways()->syncWithoutDetaching($ids);
    }
}
