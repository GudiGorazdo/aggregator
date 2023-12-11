<?php

namespace App\Orchid\Layouts\Shop;

use App\Models\City;
use App\Models\Region;
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Picture;
use App\Orchid\Fields\DynamicInput;

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
        }

        return [
            Group::make([
                Relation::make('region_id')
                    ->title('Регион')
                    ->fromModel(Region::class, 'name')
                    ->value($shop->region_id ?? null)
                    ->required(),
                Relation::make('city_id')
                    ->title('Город')
                    ->fromModel(City::class, 'name')
                    ->value($shop->city_id ?? null)
                    ->required(),
            ]),
            Input::make('name')
                ->title('Название')
                ->value($shop->name ?? '')
                ->required(),
            Input::make('title')
                ->title('Заголовок')
                ->value($shop->title ?? '')
                ->popover('Заголовок для карточки магазина')
                ->required(),
            Picture::make('picture'),
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
        ];
    }
}
