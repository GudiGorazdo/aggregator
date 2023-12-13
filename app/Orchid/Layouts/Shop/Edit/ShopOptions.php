<?php

namespace App\Orchid\Layouts\Shop\Edit;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\CheckBox;
use App\Orchid\Fields\Title;
use Orchid\Screen\Actions\Button;

class ShopOptions extends Rows
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

        return [
            Title::make('Опции')->class('pt-4'),
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

            Button::make('Сохранить')->method('save-options'),
        ];
    }
}
