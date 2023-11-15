<?php
function seedShopChains(): void
{
    $chains = \App\Models\Chain::all();
    foreach ($chains as $chain) {
        for ($i = 0; $i < rand(5, 10); $i++) {
            $shop = \App\Models\Shop::inRandomOrder()->first();
            $check = \Illuminate\Support\Facades\DB::table('chain_shops')->where('shop_id', $shop->id)->first();
            while ($check) {
                $shop = \App\Models\Shop::inRandomOrder()->first();
                $check = \Illuminate\Support\Facades\DB::table('chain_shops')->where('shop_id', $shop->id)->first();
            }

            \Illuminate\Support\Facades\DB::table('chain_shops')->insert([
                'shop_id' => $shop->id,
                'chain_id' => $chain->id
            ]);
        }
    }
}
