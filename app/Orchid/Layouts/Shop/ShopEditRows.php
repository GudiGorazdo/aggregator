<?php

namespace App\Orchid\Layouts\Shop;

use App\Models\City;
use App\Models\Region;
use App\Models\Shop;
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\SimpleMDE;
use App\Orchid\Fields\DynamicInput;
use Orchid\Screen\Fields\TextArea;

class ShopEditRows extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    private function getFiedsFromJSON(array $fields, string $name, string $placeholder, bool $names = false): array
    {
        $array = [];
        foreach ($fields as $key => $field) {
            $array[] = Input::make($name)
                ->placeholder($placeholder)
                ->value($field)
                ->title($names ? $key : '');
        }

        return $array;
    }

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
            $webs = $this->getFiedsFromJSON(json_decode($shop->web), 'web[]', 'Сайт');
            $emails = $this->getFiedsFromJSON(json_decode($shop->emails), 'emails[]', 'Адрес');
            $additionalPhones = $this->getFiedsFromJSON(
                json_decode($shop->additional_phones),
                'additional_phones[]',
                'Телефон'
            );
            $additionalSocials = $this->getFiedsFromJSON(
                json_decode($shop->more_socials, true),
                'more_socials[]',
                'Адрес',
                true,
            );
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
                    ->value($coord->lat ?? ''),
                Input::make('long')
                    ->placeholder('Долгота')
                    ->value($coord->long ?? ''),
            ]),
            Input::make('phone')
                ->title('Телефон')
                ->value($shop->phone ?? ''),
            DynamicInput::make('additional_phones')->title('Дополнительные номера телефонов'),
            // DynamicInput::make('additional_phones')->title('Дополнительные номера телефонов')->values(json_decode($shop->additional_phones)),
            // Label::make('')->title('Дополнительные номера телефонов'),
            // Group::make($additionalPhones ?? []),
            Input::make('whatsapp')
                ->title('Whatsapp')
                ->value($shop->whatsapp ?? ''),
            Input::make('telegram')
                ->title('Telegram')
                ->value($shop->telegram ?? ''),
            Input::make('vk')
                ->title('VK')
                ->value($shop->vk ?? ''),
            Label::make('')->title('Дополнительные социальные сети'),
            Group::make($additionalSocials ?? []),
            Label::make('')->title('Сайты'),
            Group::make($webs ?? []),
            Label::make('')->title('Почта'),
            Group::make($emails ?? []),
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
