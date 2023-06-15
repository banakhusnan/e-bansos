<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PaymentSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\DetailUserSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([RoleSeeder::class, PermissionSeeder::class]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Bana Khusnan',
            'email' => 'bana@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('public');

        DetailUser::factory(1)->create();

        $this->call([PaymentSeeder::class]);
    }
}
