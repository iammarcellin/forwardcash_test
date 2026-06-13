<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'active', 'description' => 'Active user account', 'display' => true],
            ['name' => 'inactive', 'description' => 'Inactive or suspended account', 'display' => true],
            ['name' => 'pending', 'description' => 'Pending verification or approval', 'display' => true],
            ['name' => 'banned', 'description' => 'Account has been banned', 'display' => true],
        ];

        foreach ($statuses as $status) {
            UserStatus::updateOrCreate(['name' => $status['name']], $status);
        }
    }
}
