<?php

namespace App\Orchid\Screens\Shop;

use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Carbon\Carbon;
use App\Models\Shop;
use App\Orchid\Filters\RegionFilter;
use App\Orchid\Layouts\Shop\ShopListTable;
use App\Orchid\Layouts\SubtractListener;
use Orchid\Screen\Actions\Link;

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
            'shops' => \App\Models\Shop::filters()
                ->defaultSort('id')
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
        return [
            Link::make('Добавить магазин')->icon('plus-alt')->route('platform.shop.add'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ShopListTable::class,
        ];
    }
}
