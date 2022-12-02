<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1000,10000),
            'stock' => $this->faker->numberBetween(1,10000),
            'image' => 'noImage',
            'category' => $this->faker->numberBetween(1,4),
        ];
    }
}
