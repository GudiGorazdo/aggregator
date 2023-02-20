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
            new \App\Filters\CityFilter('city', 'Город', ['id'=>'aside_city', 'input_id' => 'filter_city']),
            new \App\Filters\CityFilter('sub_category', 'Категория'),
            new \App\Filters\CityFilter('rating', 'Рейтинг'),
            new \App\Filters\CityFilter('area', 'Район'),
            new \App\Filters\CityFilter('subway', 'Метро'),
            new \App\Filters\OptionsFilter([
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
