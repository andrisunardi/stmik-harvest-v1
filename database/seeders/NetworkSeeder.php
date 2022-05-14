<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Network;

class NetworkSeeder extends Seeder
{
    public function run()
    {
        $data = new Network();
        $data->name = "World Harvest Center";
        $data->description = "World Harvest Center is a place where we encourage freedom in worship and believe in “church family”.";
        $data->link = "https://www.worldharvest.cc";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Network();
        $data->name = "Regent University";
        $data->description = "Regent University is a private Christian research university located in Virginia Beach, Virginia, United States.";
        $data->link = "https://www.regent.edu";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();

        $data = new Network();
        $data->name = "Handong University";
        $data->description = "Handong Global University is a private, Christian, four-year university located in Pohang, North Gyeongsang province, South Korea.";
        $data->link = "https://www.handong.edu";
        $data->image = Str::slug($data->name) . ".webp";
        $data->save();
    }
}
