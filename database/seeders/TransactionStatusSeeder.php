<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'pending', 'description' => 'Waiting for processing', 'display' => true],
            ['name' => 'processing', 'description' => 'Transaction is in progress', 'display' => true],
            ['name' => 'completed', 'description' => 'Transaction completed successfully', 'display' => true],
            ['name' => 'failed', 'description' => 'Transaction failed', 'display' => true],
            ['name' => 'cancelled', 'description' => 'Transaction cancelled by the user', 'display' => true],
        ];

        foreach ($statuses as $status) {
            TransactionStatus::updateOrCreate(['name' => $status['name']], $status);
        }
    }
}
