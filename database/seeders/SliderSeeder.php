<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $data = new Slider();
        $data->name = "Welcome To";
        $data->name_id = "Selamat Datang Di";
        $data->description = "Creating Leaders For The Future";
        $data->description_id = "Menciptakan Pemimpin Untuk Masa Depan";
        $data->button_name = "About Us";
        $data->button_name_id = "Tentang Kami";
        $data->button_link = env("APP_URL") . "/about";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Slider();
        $data->name = "The Best Education";
        $data->name_id = "Pendidikan Terbaik";
        $data->description = "Get Equipped To Transform The World";
        $data->description_id = "Dapatkan Diperlengkapi Untuk Mengubah Dunia";
        $data->button_name = "Study Program";
        $data->button_name_id = "Program Study";
        $data->button_link = env("APP_URL") . "/study-program";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Slider();
        $data->name = "High Quality Lecturers";
        $data->name_id = "Dosen Berkualitas Tinggi";
        $data->description = "HITS Will Give You The Best Education Through The Most Competent Lecturers And Creative Way Of Learning";
        $data->description_id = "HITS Akan Memberikan Anda Pendidikan Terbaik Melalui Dosen Terkompeten Dan Cara Belajar Yang Kreatif";
        $data->button_name = "Our Lecturer";
        $data->button_name_id = "Dosen Kami";
        $data->button_link = env("APP_URL") . "/lecturer";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
    }
}
