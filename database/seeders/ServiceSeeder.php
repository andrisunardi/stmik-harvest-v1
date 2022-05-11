<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $data = new Service();
        $data->name = "Sub Zero";
        $data->name_id = "Sub Zero";
        $data->description = "Sub Zero";
        $data->description_id = "Sub Zero";
        $data->link = "https://www.subzeropanel.com";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Service();
        $data->name = "Fuji AC";
        $data->name_id = "Fuji AC";
        $data->description = "Fuji AC";
        $data->description_id = "Fuji AC";
        $data->link = "https://www.fuji-ac.com";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
