<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FertilizerDistribution>
 */
class FertilizerDistributionFactory extends Factory
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
            'fertilizer_qty'=>fake()->numberBetween(1,100),
            'date'=>fake()->date(),
            'pic'=>fake()->name(),
        ];
    }
}
