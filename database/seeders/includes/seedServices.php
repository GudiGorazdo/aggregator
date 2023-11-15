<?php
function seedServices(): void
{
    $services = [
        ['Яндекс карты', 'yandex-logo.svg'],
        ['Google maps', 'google-maps-logo.svg'],
        ['2Gis', '2gis-logo.svg'],
        ['Авито', 'avito-logo.svg']
    ];

    foreach ($services as $service) {
        \App\Models\Service::factory()->create([
            'name' => $service[0],
            'logo' => $service[1],
        ]);
    }
}
