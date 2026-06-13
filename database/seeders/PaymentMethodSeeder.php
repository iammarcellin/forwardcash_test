<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        $methods = [
            ['name' => 'Bank Transfer', 'display' => true],
            ['name' => 'Mobile Money', 'display' => true],
            ['name' => 'Wallet', 'display' => true],
            ['name' => 'Card Payment', 'display' => true],
            ['name' => 'Cash Pickup', 'display' => true],
        ];

        foreach ($methods as $method) {
            PaymentMethod::updateOrCreate(['name' => $method['name']], $method);
        }
    }
}
