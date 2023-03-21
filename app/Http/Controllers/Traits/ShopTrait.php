<?php
namespace App\Http\Controllers\Traits;

use \App\Models\Shop;
use \App\Services\GetDayTimeService;
use \App\Services\GetNumEndingService;
use Illuminate\Database\Eloquent\Collection;

trait ShopTrait
{

    public function getShopData(Shop $shop): array
    {

        $photos = json_decode($shop->photos);
        $additionalPhones = json_decode($shop->additional_phones) ?? [];
        foreach ($shop->services as $service) {
            $serviceCommments = json_decode($service->pivot->comments) ?? [];
            $services[] = [
                'id' => $service->id,
                'name' => $service->name,
                'rating' => $service->pivot->rating,
                'comments' => $serviceCommments,
                'link' =>  $service->link,
                'comments_count_title' => count($serviceCommments)
                    . ' '
                    . GetNumEndingService::getNumEnding(count($serviceCommments), array('отзыв', 'oтзыва', 'отзывов'))
            ];
        }
        foreach ($shop->workingMode->toArray() as $day) {
            $workingMode[] = [
                'day' => GetDayTimeService::getDayByNum((int) $day['day_of_week']),
                'day_id' => (int)$day['day_of_week'],
                'is_open' => $day['is_open'],
                'open' => substr($day['open_time'], 0, -3),
                'close' => substr($day['close_time'], 0, -3)
            ];
        }
        foreach ($shop->categories as $key => $category) {
            $subCategories = $shop->subCategories->where('category_id', $category->id);
            foreach ($subCategories as $k => $subCategory) {
                $prices[$key]['data'][] = [
                    'name' => $subCategory->name,
                    'price' => $shop->prices->where('sub_category_id', $subCategory->id)->first()->price ?? null,
                    'sub_category_id' => $subCategory->id,
                ];
            }
            $prices[$key]['name'] =  $category->name;
            $prices[$key]['max'] = max(array_column($prices[$key]['data'], 'price')) ?? null;
            $prices[$key]['category_id'] = $category->id;
        }

        return [
            'coord' => (array)json_decode($shop->coord),
            'photos' => $photos,
            'services' => $services,
            'workingMode' => $workingMode,
            'prices' => $prices,
            'additionalPhones' => $additionalPhones,
        ];
    }


    public function getShopSimilars(Shop $shop): Collection
    {
        $shopSubCategories = $shop->subCategories->pluck('id')->toArray();
        return Shop::similarFilter(+$shop->city_id, +$shop->id, $shopSubCategories)->get();
    }
}

