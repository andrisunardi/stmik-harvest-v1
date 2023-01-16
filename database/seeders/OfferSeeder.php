<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    public function run()
    {
        $data = new Offer();
        $data->name = 'Fresh And Great Location In Lippo Village';
        $data->name_id = 'Lokasi Segar Dan Hebat Di Lippo Village';
        $data->description = 'Our location is very great and fresh. It is in Lippo Village.';
        $data->description_id = 'Lokasi kami sangat bagus dan segar. Tepatnya di Lippo Village.';
        $data->button_name = 'Contact Us';
        $data->button_name_id = 'Kontak Kami';
        $data->button_link = env('APP_URL').'/contact-us';
        $data->save();

        $data = new Offer();
        $data->name = 'Modern Facilities And Building';
        $data->name_id = 'Fasilitas dan Gedung Modern';
        $data->description = 'We provide the best environment for our students with modern facilities and building.';
        $data->description_id = 'Kami menyediakan lingkungan terbaik bagi siswa kami dengan fasilitas dan bangunan modern.';
        $data->button_name = 'Our Gallery';
        $data->button_name_id = 'Galeri Kami';
        $data->button_link = env('APP_URL').'/gallery';
        $data->save();

        $data = new Offer();
        $data->name = 'International Curriculum Standard';
        $data->name_id = 'Standar Kurikulum Internasional';
        $data->description = 'We develop international curriculum standard for our students.';
        $data->description_id = 'Kami mengembangkan standar kurikulum internasional untuk siswa kami.';
        $data->button_name = 'About Us';
        $data->button_name_id = 'Tentang Kami';
        $data->button_link = env('APP_URL').'/about';
        $data->save();

        $data = new Offer();
        $data->name = 'Experience From The Best Lecturers';
        $data->name_id = 'Pengalaman Dari Dosen Terbaik';
        $data->description = "Our lecturers are consist of academicians, business leaders and practitioners. We makes sure you'll get the best experience.";
        $data->description_id = 'Dosen kami terdiri dari akademisi, pemimpin bisnis dan praktisi. Kami memastikan Anda akan mendapatkan pengalaman terbaik.';
        $data->button_name = 'Our Lecturers';
        $data->button_name_id = 'Dosen Kami';
        $data->button_link = env('APP_URL').'/our-values';
        $data->save();
    }
}
