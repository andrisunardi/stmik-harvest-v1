<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Newsletter;

class NewsletterSeeder extends Seeder
{
    public function run()
    {
        $data = new Newsletter();
        $data->email = "info@andrisunarid.com";
        $data->save();
    }
}
