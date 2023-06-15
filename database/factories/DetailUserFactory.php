<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailUser>
 */
class DetailUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        ['user_id', 'nik', 'address', 'date_of_birth', 'no_handphone', 'job'];

        return [
            'user_id' => 2,
            'nik' => '1234567890123456',
            'address' => 'Muntilan, Magelang',
            'date_of_birth' => '2002-07-26',
            'no_handphone' => '+6285877109948',
            'job' => 'PNS',
        ];
    }
}
