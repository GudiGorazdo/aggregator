<?php

namespace App\Orchid\Layouts\Shop;

use App\Models\Shop;
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\TextArea;

class ShopEditRows extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    private function getFiedsFromJSON(array $fields, string $name, string $placeholder): array
    {
        $array = [];
        foreach ($fields as $field) {
            $array[] = Input::make($name)
                ->placeholder($placeholder)
                ->value($field);
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
        $coord = json_decode($shop->coord);
        $additionalPhones = $this->getFiedsFromJSON(json_decode($shop->additional_phones), 'additional_phones[]', 'Телефон');
        $webs = $this->getFiedsFromJSON(json_decode($shop->web), 'web[]', 'Сайт');
        $additionalSocials = $this->getFiedsFromJSON(json_decode($shop->more_socials), 'more_socials[]', 'Адрес');
        $emails = $this->getFiedsFromJSON(json_decode($shop->emails), 'emails[]', 'Адрес');

        return [
            Input::make('name')
                ->title('Название')
                ->value($shop->name)
                ->required(),
            Input::make('title')
                ->title('Заголовок')
                ->value($shop->title)
                ->required(),
            TextArea::make('description')
                ->rows(10)
                ->title('Описание')
                ->value($shop->description)
                ->required(),
            Input::make('zip')
                ->title('Индекс')
                ->value($shop->zip),
            Input::make('address')
                ->title('Адрес')
                ->value($shop->address)
                ->required(),
            Label::make('')->title('Координаты'),
            Group::make([
                Input::make('address')
                    ->placeholder('Широта')
                    ->value($coord->lat),
                Input::make('address')
                    ->placeholder('Долгота')
                    ->value($coord->long),
            ]),
            Input::make('phone')
                ->title('Телефон')
                ->value($shop->phone),
            Label::make('')->title('Дополнительные номера телефонов'),
            Group::make($additionalPhones),
            Input::make('whatsapp')
                ->title('Whatsapp')
                ->value($shop->whatsapp),
            Input::make('telegram')
                ->title('Telegram')
                ->value($shop->telegram),
            Input::make('vk')
                ->title('VK')
                ->value($shop->vk),
            Label::make('')->title('Дополнительные социальные сети'),
            Group::make($additionalSocials),
            Label::make('')->title('Сайты'),
            Group::make($webs),
            Label::make('')->title('Почта'),
            Group::make($emails),
            CheckBox::make('convenience_shop')
                ->title('Круглосуточный магазин')
                ->checked($shop->convenience_shop)
                ->horizontal(),
            CheckBox::make('appraisal_online')
                ->title('Оценка онлайн')
                ->checked($shop->appraisal_online)
                ->horizontal(),
            CheckBox::make('pawnshop')
                ->title('Ломбард')
                ->checked($shop->pawnshop)
                ->horizontal(),
            CheckBox::make('show')
                ->title('Показывать в списке')
                ->checked($shop->show)
                ->horizontal(),
        ];
    }
}
