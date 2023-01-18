<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $data = new Slider();
        $data->name = 'Welcome To';
        $data->name_idn = 'Selamat Datang Di';
        $data->description = 'Creating Leaders For The Future';
        $data->description_idn = 'Menciptakan Pemimpin Untuk Masa Depan';
        $data->button_name = 'About Us';
        $data->button_name_idn = 'Tentang Kami';
        $data->button_link = env('APP_URL').'/about';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Slider();
        $data->name = 'The Best Education';
        $data->name_idn = 'Pendidikan Terbaik';
        $data->description = 'Get Equipped To Transform The World';
        $data->description_idn = 'Dapatkan Diperlengkapi Untuk Mengubah Dunia';
        $data->button_name = 'Study Program';
        $data->button_name_idn = 'Program Study';
        $data->button_link = env('APP_URL').'/information-system';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Slider();
        $data->name = 'High Quality Lecturers';
        $data->name_idn = 'Dosen Berkualitas Tinggi';
        $data->description = 'STMIK Harvest Will Give You The Best Education Through The Most Competent Lecturers And Creative Way Of Learning';
        $data->description_idn = 'STMIK Harvest Akan Memberikan Anda Pendidikan Terbaik Melalui Dosen Terkompeten Dan Cara Belajar Yang Kreatif';
        $data->button_name = 'Our Lecturer';
        $data->button_name_idn = 'Dosen Kami';
        $data->button_link = env('APP_URL').'/our-profile';
        $data->image = Str::slug($data->name).'.png';
        $data->save();
    }
}
