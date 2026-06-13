<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'English', 'short' => 'en', 'flag' => '🇬🇧', 'display' => true],
            ['name' => 'French', 'short' => 'fr', 'flag' => '🇫🇷', 'display' => true],
        ];

        foreach ($languages as $language) {
            Language::updateOrCreate(['short' => $language['short']], $language);
        }
    }
}
