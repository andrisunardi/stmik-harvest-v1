<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $data = new Banner();
        $data->name = 'Error';
        $data->name_id = 'Error';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'About';
        $data->name_id = 'Tentang';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Our Profile';
        $data->name_id = 'Profil Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Our Values';
        $data->name_id = 'Nilai-Nilai Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Our Network';
        $data->name_id = 'Jaringan Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Faq';
        $data->name_id = 'Tanya Jawab';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Online Registration';
        $data->name_id = 'Pendaftaran Online';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Admission Calendar';
        $data->name_id = 'Kalender Admisi';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Procedure';
        $data->name_id = 'Prosedur';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Tuition Fees';
        $data->name_id = 'Biaya Pendidikan';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Scholarships';
        $data->name_id = 'Beasiswa';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Information System';
        $data->name_id = 'Sistem Informasi';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Gallery';
        $data->name_id = 'Galeri';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Events';
        $data->name_id = 'Acara';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Blog';
        $data->name_id = 'Blog';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Contact Us';
        $data->name_id = 'Hubungi Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();
    }
}
