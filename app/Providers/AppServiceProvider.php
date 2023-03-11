<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FilterService;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FilterService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(FilterService $filters)
    {
        // COMPONENTS
        Blade::component(\App\View\Components\Filters\CheckboxItem::class, 'checkbox-item');

        // ADD FILTERS
        $filters->registerFilters([
            // 'CityFilterAside' => new \App\Filters\CityFilterAside('city', 'Город', 'city_id', ['id'=>'aside_city']),
            'CityFilterHeader' => new \App\Filters\CityFilterHeader('city', 'Город', 'city_id', ['id'=>'header_city']),
            'CategoryFilter' => new \App\Filters\CategoryFilter('sub_category', 'Категория', 'id'),
            'RatingFilter' => new \App\Filters\RatingFilter('rating', 'Рейтинг', 'average_rating'),
            'LocationFilter' => new \App\Filters\LocationFilter('location', 'Район', ''),
            'OptionsFilter' => new \App\Filters\OptionsFilter([
                [
                    'name' => 'work_now',
                    'label' => 'Работает сейчас',
                ],
                [
                    'name' => 'convenience_shop',
                    'label' => 'Круглосуточно',
                ],
                [
                    'name' => 'pawnshop',
                    'label' => 'Ломбард',
                ],
                [
                    'name' => 'appraisal_online',
                    'label' => 'Онлайн оценка',
                ],
            ]),
        ]);
    }
}
