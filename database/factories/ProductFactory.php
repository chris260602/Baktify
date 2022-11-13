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
            'Name' => $this->faker->name(),
            'Description' => $this->faker->text(),
            'Price' => $this->faker->numberBetween(1000,10000),
            'Stock' => $this->faker->numberBetween(1,10000),
            'Category' => $this->faker->name(),
        ];
    }
}
