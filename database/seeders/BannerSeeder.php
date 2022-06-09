<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $data = new Banner();
        $data->name = "About";
        $data->name_id = "Tentang";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
    }
}
