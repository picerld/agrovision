<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SchoolSeeder::class,
            CommoditySeeder::class,
            SeedDistributionSeeder::class,
            FertilizerDistributionSeeder::class,
            UserSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Silfi',
            'username' => 'silfi@agrovision',
            'password' => Hash::make('password'),
            'phone_number' => '08211111'
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'test@example.com',
        ]);
    }
}
