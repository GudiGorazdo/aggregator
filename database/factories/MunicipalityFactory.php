<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Municipality>
 */
class MunicipalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $area = \App\Models\Area::inRandomOrder()->first();
        $name = fake()->word();
        for ($i = 0; $i < 2; $i++) {
            $name .= '_' . fake()->word();
        }

        return [
            'name' => $name,
            'region_id' => $area->region_id,
            'city_id' => $area->city_id,
            'area_id' => $area->id,
        ];
    }
}
