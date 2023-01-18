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
        $data->name = 'Exterior';
        $data->name_idn = 'Eksterior';
        $data->description = 'Exterior STMIK Harvest';
        $data->description_idn = 'Eksterior STMIK Harvest';
        $data->tag = 'Exterior';
        $data->tag_idn = 'Eksterior';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = 'Auditorium';
        $data->name_idn = 'Auditorium';
        $data->description = 'Auditorium STMIK Harvest';
        $data->description_idn = 'Auditorium STMIK Harvest';
        $data->tag = 'Auditorium';
        $data->tag_idn = 'Auditorium';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Gallery();
        $data->category = 1;
        $data->name = 'Basket Ball';
        $data->name_idn = 'Lapangan Basket';
        $data->description = 'Basket Ball STMIK Harvest';
        $data->description_idn = 'Lapangan Basket STMIK Harvest';
        $data->tag = 'Exterior';
        $data->tag_idn = 'Eksterior';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = 'STMIK Harvest 2016-2017';
        $data->name_idn = 'STMIK Harvest 2016-2017';
        $data->description = 'STMIK Harvest 2016-2017';
        $data->description_idn = 'STMIK Harvest 2016-2017';
        $data->tag = 'Company Profile';
        $data->tag_idn = 'Profil Perusahaan';
        $data->image = Str::slug($data->name).'.png';
        $data->youtube = 'https://www.youtube.com/watch?v=wROkewUpfe8';
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = 'STMIK Harvest';
        $data->name_idn = 'STMIK Harvest';
        $data->description = 'STMIK Harvest';
        $data->description_idn = 'STMIK Harvest';
        $data->tag = 'Company Profile';
        $data->tag_idn = 'Profil Perusahaan';
        $data->image = Str::slug($data->name).'.png';
        $data->youtube = 'https://www.youtube.com/watch?v=hmUwBHxYLDw';
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = 'Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin';
        $data->name_idn = 'Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin';
        $data->description = 'Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin';
        $data->description_idn = 'Webinar STMIK Kuwera - Harvest, Techno-Sociopreneur, Sampah Jadi Rupiah bersama Duitin';
        $data->tag = 'Webinar';
        $data->tag_idn = 'Webinar';
        $data->image = Str::slug($data->name).'.png';
        $data->youtube = 'https://www.youtube.com/watch?v=JmN2oJaqpv4';
        $data->save();

        $data = new Gallery();
        $data->category = 3;
        $data->name = 'Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021';
        $data->name_idn = 'Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021';
        $data->description = 'Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021';
        $data->description_idn = 'Wisuda Online Mahasiswa S1 Sistem Informasi STMIK Kuwera 2021';
        $data->tag = 'Company Profile';
        $data->tag_idn = 'Profil Perusahaan';
        $data->image = Str::slug($data->name).'.png';
        $data->youtube = 'https://www.youtube.com/watch?v=QwaRy3jJEVk';
        $data->save();

        $data = new Gallery();
        $data->category = 2;
        $data->name = 'Company Profile STMIK Kuwera';
        $data->name_idn = 'Company Profile STMIK Kuwera';
        $data->description = 'Company Profile STMIK Kuwera';
        $data->description_idn = 'Company Profile STMIK Kuwera';
        $data->tag = 'Company Profile';
        $data->tag_idn = 'Profil Perusahaan';
        $data->image = Str::slug($data->name).'.png';
        $data->video = Str::slug($data->name).'.mp4';
        $data->save();
    }
}
