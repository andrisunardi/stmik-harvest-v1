<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'key' => 'about_us',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'about_us_idn',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'vision',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'vision_idn',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'mission',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'mission_idn',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'history',
            'value' => "",
        ]);

        Setting::create([
            'key' => 'history_idn',
            'value' => "",
        ]);
    }
}
