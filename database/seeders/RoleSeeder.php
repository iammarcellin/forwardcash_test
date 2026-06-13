<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'System administrator', 'display' => true],
            ['name' => 'customer', 'description' => 'Registered customer', 'display' => true],
            ['name' => 'agent', 'description' => 'Money transfer agent', 'display' => true],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
