<?php

namespace Database\Seeders;

use App\Models\FertilizerDistribution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FertilizerDistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FertilizerDistribution::factory(10)->create();
    }
}
