<?php

namespace App\Orchid\Layouts\Shop\Edit;

use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
use App\Orchid\Fields\Title;
use Orchid\Screen\Actions\Button;
use App\Orchid\Layouts\Shop\Edit\ShopEditRow;
use App\Models\Shop;

class ShopChain extends ShopEditRow
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    public function getRow(Shop $shop): iterable
    {
        $chains = \App\Models\Chain::all()->pluck('name', 'id');

        $row = [
            Title::make('Принадлежит сети'),
            Group::make([
                Select::make('chains')->options($chains)->empty($chains[$shop->chain_id] ?? '', $shop->chain_id ?? ''),
                Button::make('Сохранить')->method('save-chain'),
            ]),
        ];

        return $row;
    }

    public function getMethod(): string
    {
        return 'cahains';
    }
}
