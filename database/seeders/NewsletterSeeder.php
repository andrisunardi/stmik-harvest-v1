<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    public function run()
    {
        $data = new Newsletter();
        $data->email = "info@andrisunardi.com";
        $data->save();
    }
}
