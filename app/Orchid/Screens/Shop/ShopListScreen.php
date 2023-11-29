<?php

namespace App\Orchid\Screens\Shop;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Carbon\Carbon;
use App\Models\Shop;

class ShopListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'shops' => Shop::filters()
                ->defaultSort('id', 'asc')
                ->with('city')
                ->with('region')
                ->with('area')
                ->with('subways')
                ->with('municipality')
                ->paginate(20),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список магазинов';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('shops', [
                TD::make('id', 'Ид')->sort()->popover('Идентификационный номер в системе')->filter(TD::FILTER_NUMERIC),
                TD::make('region_id', 'Регион')->render(function (Shop $shop) {
                    return $shop->region->name;
                })->sort()->filter(TD::FILTER_TEXT),
                TD::make('city_id', 'Город')->render(function (Shop $shop) {
                    return $shop->city->name;
                })->sort()->filter(TD::FILTER_TEXT),
                TD::make('area_id', 'Район')->render(function (Shop $shop) {
                    return $shop->area->name;
                })->sort()->defaultHidden(),
                TD::make('', 'Метро')->render(function (Shop $shop) {
                    return $shop->subways->pluck('name')->implode(', ');
                })->defaultHidden(),
                TD::make('municipality_id', 'Муниципалитет')->render(function (Shop $shop) {
                    return $shop->municipality->name;
                })->sort()->defaultHidden(),
                TD::make('name', 'Название')->sort(),
                TD::make('title', 'Заголовок')->popover('Заголовок для карточки магазина')->defaultHidden(),
                TD::make('phone', 'Телефон'),
                TD::make('whatsapp', 'Watsapp')->defaultHidden(),
                TD::make('telegram', 'Telegram')->defaultHidden(),
                TD::make('vk', 'VK')->defaultHidden(),
                TD::make('emails', 'Почта')->render(function (Shop $shop) {
                    $emails = json_decode($shop->emails);
                    return implode(', ', $emails);
                })->filter(TD::FILTER_TEXT)->defaultHidden(),
                TD::make('address', 'Адрес'),
                TD::make('convenience_shop', 'Круглосуточный')->render(function (Shop $shop) {
                    return $shop->convenience_shop ? 'да' : 'нет';
                })->sort()->defaultHidden()->width('70px'),
                TD::make('appraisal_online', 'Оценка онлайн')->render(function (Shop $shop) {
                    return $shop->appraisal_online ? 'да' : 'нет';
                })->sort()->defaultHidden()->width('70px'),
                TD::make('pawnshop', 'Ломбард')->render(function (Shop $shop) {
                    return $shop->pawnshop ? 'да' : 'нет';
                })->sort()->defaultHidden()->width('70px'),
                TD::make('average_rating', 'Средний рейтинг')->sort()->defaultHidden()->width('70px'),
                TD::make('show', 'Статус')->render(function (Shop $shop) {
                    return $shop->show ? 'Показывать' : 'Не показывать';
                })->sort()->defaultHidden(),
                TD::make('created_at', 'Дата добавления')->render(function (Shop $shop) {
                    return Carbon::parse($shop->created_at)->format('d.m.Y H:i');;
                })->sort()->defaultHidden(),
                TD::make('updated_at', 'Дата добавления')->render(function (Shop $shop) {
                    return Carbon::parse($shop->updated_at)->format('d.m.Y H:i');;
                })->sort()->defaultHidden(),
            ]),
        ]; }
}
