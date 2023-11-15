<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->city();
        $region = \App\Models\Region::inRandomOrder()->first();

        return [
            'name' => $name,
            'name_for_title' => $name,
            'region_id' => $region->id,
            'coord' => json_encode(array(
                'lat' => fake()->latitude(47, 65),
                'long' => fake()->longitude(30, 100)
            ))
        ];
    }
}
