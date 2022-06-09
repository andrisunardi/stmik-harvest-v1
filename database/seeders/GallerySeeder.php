<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $data = new Gallery();
        $data->category = 1;
        $data->name = "Exterior";
        $data->name_id = "Eksterior";
        $data->description = "Exterior STMIK Harvest";
        $data->description_id = "Eksterior STMIK Harvest";
        $data->tag = "Exterior";
        $data->tag_id = "Eksterior";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Auditorium";
        $data->name_id = "Auditorium";
        $data->description = "Auditorium STMIK Harvest";
        $data->description_id = "Auditorium STMIK Harvest";
        $data->tag = "Auditorium";
        $data->tag_id = "Auditorium";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = "Basket Ball";
        $data->name_id = "Lapangan Basket";
        $data->description = "Basket Ball STMIK Harvest";
        $data->description_id = "Lapangan Basket STMIK Harvest";
        $data->tag = "Exterior";
        $data->tag_id = "Eksterior";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = "SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->name_id = "SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->description = "Description SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->description_id = "Deskripsi SPIRITUAL DAY SESI 2 A Place of Power to Live Holy";
        $data->tag = "Graduation";
        $data->tag_id = "Kelulusan";
        $data->image = Str::slug($data->name) . ".png";
        $data->youtube = "https://www.youtube.com/watch?v=DAwvESRyGjk";
        $data->save();
    }
}
