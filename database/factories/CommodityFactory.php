<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commodity>
 */
class CommodityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'commodity-1.jpg',
            'commodity-2.jpg',
            'commodity-3.jpg',
            'commodity-4.jpg',
            'commodity-5.jpg',
            'commodity-6.jpg',
        ];

        return [
            'name' => fake()->name(),
            'image' => fake()->randomElement($images),
            'harvest_date' => fake()->word(),
        ];
    }
}
