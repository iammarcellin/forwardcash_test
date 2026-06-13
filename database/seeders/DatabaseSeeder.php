<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            RoleSeeder::class,
            UserStatusSeeder::class,
            TransactionStatusSeeder::class,
            CountrySeeder::class,
            PaymentMethodSeeder::class,
        ]);

        User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'test@example.com',
            'customer_id' => 'CUST000001',
            'password' => 'password',
            'language_id' => 1,
            'role_id' => 2,
            'user_status_id' => 1,
            'phone' => '+0000000000',
            'address_1' => '123 Main St',
            'city' => 'Nairobi',
            'postcode' => '00000',
            'date_of_birth' => '1990-01-01',
        ]);
    }
}
