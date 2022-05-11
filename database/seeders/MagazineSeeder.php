<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Magazine;

class MagazineSeeder extends Seeder
{
    public function run()
    {
        $data = new Magazine();
        $data->name = "HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You";
        $data->name_id = "HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You";
        $data->description = "Description HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You";
        $data->description_id = "Deskripsi HITS Magazine Volume 01 - Valentine Edition - On Your Worst Day, I Love You";
        $data->image = Str::slug($data->name) . ".png";
        $data->file = Str::slug($data->name) . ".pdf";
        $data->save();

        $data = new Magazine();
        $data->name = "GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online";
        $data->name_id = "GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online";
        $data->description = "Description GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online";
        $data->description_id = "Deskripsi GREATER DESTINY Wisuda HITS 2021 - Untuk Share Online";
        $data->image = Str::slug($data->name) . ".png";
        $data->file = Str::slug($data->name) . ".pdf";
        $data->save();
    }
}
