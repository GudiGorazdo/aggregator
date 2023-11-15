<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = 'sub_category';
        for ($i = 0; $i < 2; $i++) {
            $name .= '_' . fake()->word();
        }

        $category = \App\Models\Category::inRandomOrder()->first();

        return [
            'name' => $name,
            'category_id' => $category->id,
        ];
    }
}
