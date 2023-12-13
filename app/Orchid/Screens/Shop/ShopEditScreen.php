<?php

namespace App\Orchid\Screens\Shop;

use App\Models\Shop;
use App\Orchid\Layouts\Shop\Edit\ShopCategories;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use App\Orchid\Layouts\Shop\Edit\ShopChain;
use App\Orchid\Layouts\Shop\Edit\ShopContacts;
use App\Orchid\Layouts\Shop\Edit\ShopDescription;
use App\Orchid\Layouts\Shop\Edit\ShopLocation;
use App\Orchid\Layouts\Shop\Edit\ShopOptions;
use App\Orchid\Layouts\Shop\Edit\ShopWorkingMode;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;

class ShopEditScreen extends Screen
{
    public $shop;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Shop $shop): iterable
    {
        return [
            'shop' => $shop,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Редактирование';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить все изменения')->icon('save-alt')->method('save')->turbo(false),
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
            Layout::modal('exampleModal', [
                // ModalToggle::make('Launch demo modal')
                //     ->modal('exampleModal')
                //     ->method('action')
                //     ->icon('full-screen'),
            ]),
            Layout::modal('exampleModal', [
                Layout::rows([]),
            ]),
            ShopCategories::class,
            ShopChain::class,
            ShopLocation::class,
            ShopDescription::class,
            ShopContacts::class,
            ShopOptions::class,
            ShopWorkingMode::class,
        ];
    }

    public function save(Request $request): void
    {
        \App\Helpers::log($request->all());
    }

    public function edit(Request $request): void
    {
        \App\Helpers::log($request->all());
    }
}
