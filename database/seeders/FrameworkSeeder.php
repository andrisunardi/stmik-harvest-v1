<?php

namespace Database\Seeders;

use App\Models\Framework;
use Illuminate\Database\Seeder;

class FrameworkSeeder extends Seeder
{
    public function run()
    {
        Framework::create([
            'name' => 'Laravel',
            'description' => 'Version 8.13.0',
            'link' => 'https://laravel.com',
            'image' => 'laravel.webp',
            'active' => true,
        ]);

        Framework::create([
            'name' => 'PHP7',
            'description' => 'Version 7.4.12',
            'link' => 'https://www.php.net',
            'image' => 'php7.webp',
            'active' => true,
        ]);

        Framework::create([
            'name' => 'Bootstrap',
            'description' => 'Version 4.5.3',
            'link' => 'https://getbootstrap.com',
            'image' => 'bootstrap.webp',
            'active' => true,
        ]);

        Framework::create([
            'name' => 'HTML 5 CSS 3 JS',
            'description' => 'Version HTML5 CSS3 JS',
            'link' => 'https://www.w3schools.com/html/html5_intro.asp',
            'image' => 'html5-css3-js.webp',
            'active' => true,
        ]);

        Framework::create([
            'name' => 'CPanel',
            'description' => 'Version 88.0.10',
            'link' => 'https://www.cpanel.net',
            'image' => 'cpanel.webp',
            'active' => true,
        ]);

        Framework::create([
            'name' => 'PHPMyAdmin',
            'description' => 'Version 5.0.4',
            'link' => 'https://www.phpmyadmin.net',
            'image' => 'phpmyadmin.webp',
            'active' => true,
        ]);
    }
}
