<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    public function run()
    {
        $data = new Newsletter();
        $data->value = 'pmb@stmikku.ac.id';
        $data->type = 1;
        $data->save();
    }
}
