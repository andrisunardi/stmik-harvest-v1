<?php

namespace Database\Seeders;

use App\Models\Access;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    public function run()
    {
        $data = new Access();
        $data->name = "Super Admin";
        $data->save();

        $data = new Access();
        $data->name = "Admin";
        $data->save();
    }
}
