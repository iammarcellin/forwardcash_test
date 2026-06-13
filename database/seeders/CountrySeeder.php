<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['country_code' => 'BI', 'country_name' => 'Burundi', 'prefix' => '+257', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 1500.00, 'display' => true],
            ['country_code' => 'CA', 'country_name' => 'Canada', 'prefix' => '+1', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 2.50, 'display' => true],
            ['country_code' => 'BE', 'country_name' => 'Belgium', 'prefix' => '+32', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 2.00, 'display' => true],
            ['country_code' => 'DK', 'country_name' => 'Denmark', 'prefix' => '+45', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 2.00, 'display' => true],
            ['country_code' => 'SE', 'country_name' => 'Sweden', 'prefix' => '+46', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 2.00, 'display' => true],
            ['country_code' => 'PL', 'country_name' => 'Poland', 'prefix' => '+48', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 1.50, 'display' => true],
            ['country_code' => 'FI', 'country_name' => 'Finland', 'prefix' => '+358', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 2.00, 'display' => true],
            ['country_code' => 'NO', 'country_name' => 'Norway', 'prefix' => '+47', 'send_from' => true, 'send_to' => true, 'transfer_fee' => 2.50, 'display' => true],
        ];

        foreach ($countries as $country) {
            Country::updateOrCreate(['country_code' => $country['country_code']], $country);
        }
    }
}
