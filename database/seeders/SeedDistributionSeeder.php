<?php

namespace Database\Seeders;

use App\Models\SeedDistribution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedDistributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeedDistribution::factory(10)->create();
    }
}
