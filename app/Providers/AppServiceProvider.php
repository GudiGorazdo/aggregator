<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FilterService;
use Illuminate\Http\Request;

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
        $filters->registerFilters([
            'CityFilter' => new \App\Filters\CityFilter('city', 'Город', ['id'=>'aside_city', 'input_id' => 'filter_city']),
            'CategoryFilter' => new \App\Filters\CategoryFilter('sub_category', 'Категория'),
            'RatingFilter' => new \App\Filters\RatingFilter('rating', 'Рейтинг'),
            'AreaFilter' => new \App\Filters\AreaFilter('area', 'Район'),
            'SubwayFilter' => new \App\Filters\SubwayFilter('subway', 'Метро'),
            'OptionsFilter' => new \App\Filters\OptionsFilter([
                [
                    'name' => 'work_now',
                    'label' => ' Работает сейчас',
                ],
                [
                    'name' => 'convenience_shop',
                    'label' => ' Круглосуточно',
                ],
                [
                    'name' => 'is_pawnshop',
                    'label' => ' Ломбард',
                ],
                [
                    'name' => 'appraisal_online',
                    'label' => ' Онлайн оценка',
                ],
            ]),
        ]);
        // dd($filters);
    }
}
