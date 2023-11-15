<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubwayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->word();
        for ($i = 0; $i < 2; $i++) {
            $name .= '_' . fake()->word();
        }

        do {
            $area = \App\Models\Area::inRandomOrder()->first();
        } while($area->city_id == 4 || $area->city_id == 5);

        return [
            'name' => $name,
            'city_id' => $area->city_id,
            'area_id' => $area->id,
        ];
    }
}
