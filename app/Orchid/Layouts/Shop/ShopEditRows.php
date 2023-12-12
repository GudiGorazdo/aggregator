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
use App\Orchid\Fields\ShopLocation;

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
            ShopLocation::make('location')->shop(isset($shop->id) ? 1 : 0, $shop->region_id, $shop->city_id, $shop->area_id, implode(',', ($subways ?? []))),
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
        ];
    }
}
