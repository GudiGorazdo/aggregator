<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use \App\Services\FilterService;
use \App\Services\ImportDataService;

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
        $this->app->bind(ImportDataService::class, function ($app) {
            return new ImportDataService();
        });
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
            'CategoryFilter' => new \App\Filters\CategoryFilter('category', 'Категория', 'id'),
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


