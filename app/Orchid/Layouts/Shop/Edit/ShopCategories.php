<?php

namespace App\Orchid\Layouts\Shop\Edit;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use App\Orchid\Fields\Title;
use App\Orchid\Fields\SelectRelation;
use Orchid\Screen\Actions\Button;

class ShopCategories extends Rows
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
            Title::make('Категории')->class('pt-4'),
            // SelectRelation::make('categories')
            //     ->controller('categories')
            //     ->inputs([
            //         'category' => [
            //             'default' => true,
            //             'name' => 'category_id',
            //             'id' => 'select-category',
            //             'placeholder' => 'Выбрать категорию',
            //             'current' => $shop->region_id ?? null,
            //         ],
            //         'subCategories' =>  [
            //             'multiple' => true,
            //             'name' => 'sub_categories[]',
            //             'id' => 'select-subcategories',
            //             'title' => 'Подкатегории',
            //             'placeholder' => 'Выбрать подкатегории',
            //             'current' => implode(',', ($subways ?? [])),
            //         ],
            //     ])->edit($shop->id ? true : false),

            Button::make('Сохранить')->method('save-categories'),
        ];
    }
}
