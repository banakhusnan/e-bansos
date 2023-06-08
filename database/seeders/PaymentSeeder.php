<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['listrik', 'air', 'internet'];
        $prices = [50000, 100000, 150000, 200000];

        foreach ($types as $type) {
            foreach ($prices as $price) {
                Payment::create([
                    'type' => $type,
                    'amount' => 1,
                    'price' => $price,
                ]);
            }
        }
    }
}
