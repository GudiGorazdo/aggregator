<?php
function seedShopServices(): void
{
    $shops = \App\Models\Shop::all();
    $services = \App\Models\Service::all();

    foreach ($shops as $shop) {
        foreach ($services as $service) {
            $comments = [];
            for ($i = 0; $i < rand(1, 7); $i++) {
                $comments[$i] = [
                    'name' => 'name_' . ($i + 1),
                    'date' => date('Y-m-d', mt_rand(1, time())),
                    'rating' => rand(11, 50) / 10,
                    'text' => implode('', fake()->paragraphs()),
                    'response' => [],
                ];
                if (rand(0, 1) > 0) {
                    $comments[$i]['response'] = [
                        'name' => 'name',
                        'date' => date('Y-m-d', mt_rand(1, time())),
                        'rating' => rand(11, 50) / 10,
                        'text' => implode('', fake()->paragraphs()),
                    ];
                }
            }

            \Illuminate\Support\Facades\DB::table('shop_services')->insert([
                'shop_id' => $shop->id,
                'service_id' => $service->id,
                'service_shop_id' => fake()->uuid(),
                'rating' => rand(11, 50) / 10,
                'rating_count' => rand(10, 100),
                'link' => '#',
                'comments' => json_encode($comments),
            ]);
        }
    }
}
