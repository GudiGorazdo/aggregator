<?php

namespace App\Orchid\Layouts\Shop\Edit;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use App\Orchid\Fields\Title;
use App\Orchid\Fields\SelectRelation;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Undefined;
use Orchid\Screen\Actions\Button;

class ShopCategories extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    private function createInputsGroups(Collection|null $categories)
    {
        $template = [
            'category' => [
                'default' => true,
                'name' => 'category_id[]',
                'id' => 'select-category',
                'placeholder' => 'Выбрать категорию',
            ],
            'subCategories' =>  [
                'multiple' => true,
                'name' => 'sub_categories[]',
                'id' => 'select-subcategories',
                'title' => 'Подкатегории',
                'placeholder' => 'Выбрать подкатегории',
            ],
        ];

        if (!$categories) return [$template];

        $groups = [];
        foreach ($categories as $key => $category) {
            $newCategory = [...$template['category']];
            $newCategory['current'] = $key;
            $newSubCategories = [...$template['subCategories']];
            $newSubCategories['current'] = implode(',', $category->pluck('id')->toArray());
            $groups[] = [$newCategory, $newSubCategories];
        }

        return $groups;
    }

    private function getRow($categories, $checkButton)
    {
        $row = [
            Title::make('Категории')->class('pt-4'),
            SelectRelation::make('categories')
                ->controller('categories')
                ->inputsGroups($this->createInputsGroups($categories))->setRows(),
        ];

        if ($checkButton) {
            $row[] = Button::make('Сохранить')->method('save-categories')->class('btn btn-success m-auto')->right();
        }

        return $row;
    }

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        $categories = null;
        $shop = $this->query->get('shop');
        if ($shop->id) {
            $categories = \App\Models\SubCategory::getByShopID($shop->id)->get()->groupBy('category_id');
        }

        return $this->getRow($categories, $shop->id ? true : false);
    }
}
