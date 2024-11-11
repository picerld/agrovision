<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeedDistribution>
 */
class SeedDistributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_id'=>fake()->numberBetween(1,10),
            'seed_qty'=>fake()->numberBetween(1,100),
            'date'=>fake()->date(),
            'unit'=>fake()->word(),
            'pic'=>fake()->name(),
            'type_of_seed'=>fake()->numberBetween(1,10),
        ];
    }
}
