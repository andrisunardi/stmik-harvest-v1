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
        $data->name = "STMIK Harvest 2016-2017";
        $data->name_id = "STMIK Harvest 2016-2017";
        $data->description = "STMIK Harvest 2016-2017";
        $data->description_id = "STMIK Harvest 2016-2017";
        $data->tag = "Company Profile";
        $data->tag_id = "Profil Perusahaan";
        $data->image = Str::slug($data->name) . ".png";
        $data->youtube = "https://www.youtube.com/watch?v=wROkewUpfe8";
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = "STMIK Harvest";
        $data->name_id = "STMIK Harvest";
        $data->description = "STMIK Harvest";
        $data->description_id = "STMIK Harvest";
        $data->tag = "Company Profile";
        $data->tag_id = "Profil Perusahaan";
        $data->image = Str::slug($data->name) . ".png";
        $data->youtube = "https://www.youtube.com/watch?v=hmUwBHxYLDw";
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = "Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin";
        $data->name_id = "Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin";
        $data->description = "Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin";
        $data->description_id = "Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin";
        $data->tag = "Webinar";
        $data->tag_id = "Webinar";
        $data->image = Str::slug($data->name) . ".png";
        $data->youtube = "https://www.youtube.com/watch?v=JmN2oJaqpv4";
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = "Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021";
        $data->name_id = "Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021";
        $data->description = "Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021";
        $data->description_id = "Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021";
        $data->tag = "Company Profile";
        $data->tag_id = "Profil Perusahaan";
        $data->image = Str::slug($data->name) . ".png";
        $data->youtube = "https://www.youtube.com/watch?v=QwaRy3jJEVk";
        $data->save();
    }
}
