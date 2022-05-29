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
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(10),
            'long_description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 5, 150),

            'category_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
