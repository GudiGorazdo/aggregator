<?php

namespace App\Orchid\Layouts\Shop\Edit;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use App\Orchid\Fields\Title;
use App\Orchid\Fields\SelectRelation;
use Orchid\Screen\Actions\Button;

class ShopLocation extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $shop = $this->query->get('shop');
        if ($shop->id) {
            $subways = \App\Models\Shop::find($shop->id)->subways->pluck('id')->toArray();
            $coord = json_decode($shop->coord);
        }

        return [
            Title::make('Регион')->class('pt-4'),
            SelectRelation::make('location')
                ->controller('location')
                ->inputs([
                    'region' => [
                        'name' => 'region_id',
                        'id' => 'select-region',
                        'default' => true,
                        'placeholder' => 'Выбрать регион',
                        'current' => $shop->region_id,
                    ],
                    'city' =>  [
                        'name' => 'city_id',
                        'id' => 'select-city',
                        'title' => 'Город',
                        'placeholder' => 'Выбрать город',
                        'current' => $shop->city_id,
                    ],
                    'area' => [
                        'name' => 'area_id',
                        'id' => 'select-area',
                        'title' => 'Район',
                        'placeholder' => 'Выбрать район',
                        'current' => $shop->area_id,
                    ],
                    'subways' => [
                        'name' => 'subways[]',
                        'id' => 'select-subways',
                        'multiple' => true,
                        'title' => 'Метро',
                        'placeholder' => 'Выбрать метро',
                        'current' => implode(',', ($subways ?? [])),
                    ],
                ])
                ->edit($shop->id ? true : false)
                ->addButton(true),
            Label::make('')->title('Координаты'),
            Group::make([
                Input::make('lat')
                    ->placeholder('Широта')
                    ->value($coord->lat ?? '')
                    ->mask([
                        'mask' => '99.99999',
                        'numericInput' => true
                    ]),
                Input::make('long')
                    ->placeholder('Долгота')
                    ->value($coord->long ?? '')
                    ->mask([
                        'mask' => '99.99999',
                        'numericInput' => true
                    ]),
            ])->autoWidth(),

            Button::make('Сохранить')->method('save-location'),
        ];
    }
}
