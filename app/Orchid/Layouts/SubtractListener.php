<?php

namespace App\Orchid\Layouts;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Listener;
use Orchid\Screen\Repository;
use Orchid\Support\Facades\Layout;

class SubtractListener extends Listener
{
    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'region_id',
        'city_id',
        'area_id',
        'subways.'
    ];

    /**
     * @return Layout[]
     */
    protected function layouts(): iterable
    {
        return [
            Layout::rows([
                Select::make('region_id')
                    ->title('Регион')
                    ->options(\App\Models\Region::pluck('name', 'id')->toArray())
                    ->empty(),

                Select::make('city_id')
                    ->title('Город')
                    ->options(\App\Models\City::where('region_id', $this->query->get('region_id'))->pluck('name', 'id')->toArray())
                    ->empty()
                    ->canSee($this->query->has('region_id') && $this->query->get('region_id')),

                Select::make('area_id')
                    ->title('Район')
                    ->options(\App\Models\Area::where('city_id', $this->query->get('city_id'))->pluck('name', 'id')->toArray())
                    ->empty()
                    ->canSee($this->query->has('city_id') && $this->query->get('city_id')),

                Select::make('subways.')
                    ->title('Метро')
                    ->options(\App\Models\Subway::where('area_id', $this->query->get('area_id'))->pluck('name', 'id')->toArray())
                    ->empty()
                    ->multiple()
                    ->canSee($this->query->has('area_id') && $this->query->get('area_id')),
            ]),
        ];
    }
    /**
     * @param \Orchid\Screen\Repository $repository
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Orchid\Screen\Repository
     */
    public function handle(Repository $repository, Request $request): Repository
    {
        $result = $request->all();
        $regionID = $result['region_id'];
        $cityID = $result['city_id'] ?? null;
        $areaID = $result['area_id'] ?? null;
        $subways = $result['subways'] ?? null;

        // dd($area_id);


        return $repository
            ->set('region_id', $regionID)
            ->set('city_id', $cityID)
            ->set('area_id', $areaID)
            ->set('subways', $subways);
    }
}
