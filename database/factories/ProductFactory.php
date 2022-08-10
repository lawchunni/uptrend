<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug,
            'color' =>  $this->faker->colorName(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->numberBetween($min = 1, $max = 15),
            'gender_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'size_id' =>  $this->faker->numberBetween($min = 1, $max = 8),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
