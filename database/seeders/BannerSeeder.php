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

        $data = new Banner();
        $data->name = "Lecturer";
        $data->name_id = "Dosen";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "Gallery";
        $data->name_id = "Galeri";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "Faq";
        $data->name_id = "Tanya Jawab";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "Study Program";
        $data->name_id = "Program Studi";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "News & Event";
        $data->name_id = "Berita & Kegiatan";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "Repository";
        $data->name_id = "Repository";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "Magazine";
        $data->name_id = "Majalah";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();

        $data = new Banner();
        $data->name = "Contact Us";
        $data->name_id = "Kontak Kami";
        $data->image = Str::slug($data->name) . ".png";
        $data->save();
    }
}
