<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Access;

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
