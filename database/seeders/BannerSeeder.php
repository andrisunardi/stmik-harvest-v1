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
        $data->name_idn = 'Error';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'About';
        $data->name_idn = 'Tentang';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Our Profile';
        $data->name_idn = 'Profil Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Our Values';
        $data->name_idn = 'Nilai-Nilai Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Our Network';
        $data->name_idn = 'Jaringan Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Faq';
        $data->name_idn = 'Tanya Jawab';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Online Registration';
        $data->name_idn = 'Pendaftaran Online';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Admission Calendar';
        $data->name_idn = 'Kalender Admisi';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Procedure';
        $data->name_idn = 'Prosedur';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Tuition Fees';
        $data->name_idn = 'Biaya Pendidikan';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Scholarships';
        $data->name_idn = 'Beasiswa';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Information System';
        $data->name_idn = 'Sistem Informasi';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Gallery';
        $data->name_idn = 'Galeri';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Events';
        $data->name_idn = 'Acara';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Blog';
        $data->name_idn = 'Blog';
        $data->image = Str::slug($data->name).'.png';
        $data->save();

        $data = new Banner();
        $data->name = 'Contact Us';
        $data->name_idn = 'Kontak Kami';
        $data->image = Str::slug($data->name).'.png';
        $data->save();
    }
}
