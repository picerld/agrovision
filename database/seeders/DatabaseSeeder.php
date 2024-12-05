<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions = [
            "commodity" => [
                "view commodity",
                "create commodity",
                "update commodity",
                "delete commodity",
            ],
            "school" => [
                "view school",
                "create school",
                "update school",
                "delete school",
            ],
            "seed distribution" => [
                "view seed",
                "create seed",
                "update seed",
                "delete seed",
            ],
            "fertilizer distribution" => [
                "view fertilizer",
                "create fertilizer",
                "update fertilizer",
                "delete fertilizer",
            ],
            "user" => [
                "view user",
                "create user",
                "update user",
                "delete user",
            ],
            "leveling" => [
                "view leveling",
                "create leveling",
                "update leveling",
                "delete leveling",
            ]
        ];

        foreach ($permissions as $group => $permissionList) {
            foreach ($permissionList as $value) {
                Permission::create([
                    'name' => $value,
                    'group' => $group
                ]);
            }
        }

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo($permissions);

        $this->call([
            SchoolSeeder::class,
            CommoditySeeder::class,
            SeedDistributionSeeder::class,
            FertilizerDistributionSeeder::class,
            UserSeeder::class
        ]);


        $user = User::factory()->create([
            'name' => 'Silfi',
            'username' => 'silfi',
            'password' => Hash::make('password'),
            'phone_number' => '08211111'
        ]);

        $user->assignRole($role);
    }
}
