<?php

namespace App\Orchid\Layouts\Shop;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\SimpleMDE;
use App\Orchid\Fields\DynamicInput;
use App\Orchid\Fields\SelectRelation;

class ShopEditRows extends Rows
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
            $coord = json_decode($shop->coord);
            $subways = \App\Models\Shop::find($shop->id)->subways->pluck('id')->toArray();
        }



        return [
            SelectRelation::make('location')
                ->inputs([
                    'region' => [
                        'name' => 'region_id',
                        'id' => 'select-region',
                        'default' => true,
                        'title' => 'Регион',
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
                ])->edit($shop->id ? true : false),
            Input::make('name')
                ->title('Название')
                ->value($shop->name ?? '')
                ->required(),
            Input::make('title')
                ->title('Заголовок')
                ->value($shop->title ?? '')
                ->popover('Заголовок для карточки магазина')
                ->required(),
            SimpleMDE::make('description')->value($shop->description ?? ''),
            Input::make('zip')
                ->title('Индекс')
                ->value($shop->zip ?? ''),
            Input::make('address')
                ->title('Адрес')
                ->value($shop->address ?? '')
                ->required(),
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
            ]),
            Input::make('phone')
                ->title('Телефон')
                ->value($shop->phone ?? '')
                ->mask([
                    'mask' => '999 999 9999',
                    'numericInput' => true
                ]),
            DynamicInput::make('additional_phones')
                ->title('Дополнительные номера телефонов')
                ->value($shop->phone ?? '')
                ->mask([
                    'mask' => '999 999 9999',
                    'numericInput' => true
                ])
                ->values(json_decode($shop->additional_phones, true) ?? []),
            Input::make('whatsapp')
                ->title('Whatsapp')
                ->value($shop->whatsapp ?? ''),
            Input::make('telegram')
                ->title('Telegram')
                ->value($shop->telegram ?? ''),
            Input::make('vk')
                ->title('VK')
                ->value($shop->vk ?? ''),
            DynamicInput::make('more_socials')
                ->title('Дополнительные социальные сети')
                ->values(json_decode($shop->more_socials, true) ?? [])
                ->useNames('Название', 'Ссылка'),
            DynamicInput::make('web')
                ->title('Сайты')
                ->values(json_decode($shop->web, true) ?? []),
            DynamicInput::make('emails')
                ->title('Почта')
                ->values(json_decode($shop->emails, true) ?? []),
            CheckBox::make('convenience_shop')
                ->title('Круглосуточный магазин')
                ->checked($shop->convenience_shop ?? false)
                ->horizontal(),
            CheckBox::make('appraisal_online')
                ->title('Оценка онлайн')
                ->checked($shop->appraisal_online ?? false)
                ->horizontal(),
            CheckBox::make('pawnshop')
                ->title('Ломбард')
                ->checked($shop->pawnshop ?? false)
                ->horizontal(),
            CheckBox::make('show')
                ->title('Показывать в списке')
                ->checked($shop->show ?? true)
                ->horizontal(),
            // Label::make('')->render('<h2>Категории</h2>'),
        ];
    }
}
