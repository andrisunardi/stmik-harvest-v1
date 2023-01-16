<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create([
            'key' => 'about_us',
            'value' => "STMIK Harvest Foundation has a university named <b>STMIK KUWERA (KESUNUS WIRA EKA NUSANTARA)</b> otherwise known as <b>SCHOOL OF TECHNOPRENEUR NUSANTARA (SOTN)</b>. Established since 1987, starting in South Jakarta, until now it is still standing with a new and more advanced vision and mission following the developments of the current technological era.",
        ]);

        Setting::create([
            'key' => 'about_us_idn',
            'value' => "Yayasan STMIK Harvest memiliki sebuah perguruan tinggi bernama <b>STMIK KUWERA (KESATUAN USAHA WIRA EKA NUSANTARA)</b> atau dikenal sebagai <b>SCHOOL OF TECHNOPRENEUR NUSANTARA (SOTN)</b>. Berdiri sejak 1987, bermula di Jakarta selatan, hingga saat ini masih berdiri dengan visi dan misi yang baru dan lebih terdepan mengikuti perkembangan jaman teknologi saat ini.",
        ]);

        Setting::create([
            'key' => 'vision',
            'value' => "The realization of an excellent information systems study program by creating graduates who are smart and competitive and have the spirit of technoprenuership with leadership character in 2025.",
        ]);

        Setting::create([
            'key' => 'vision_idn',
            'value' => "Terwujudnya program studi sistem informasi yang unggul dengan menciptakan lulusan yang cerdas dan kompetitif serta memiliki semangat technoprenuership yang memiliki karakter kepemimpinan pada tahun 2025.",
        ]);

        Setting::create([
            'key' => 'mission',
            'value' => "<p>1. Organizing education in the field of information systems.</p><p>2. Carry out studies and developments in order to produce innovations that support the development of social life, especially in the field of information systems.</p><p>3. Prepare graduates in the field of information systems who are ready to work and have entrepreneurial skills.</p><p>4. Develop information systems education that prioritizes character development in the field of leadership with a global perspective.</p>",
        ]);

        Setting::create([
            'key' => 'mission_idn',
            'value' => "<p>1. Menyelenggarakan pendidikan dalam bidang sistem informasi.</p><p>2. Melaksanakan kajian-kajian dan pengembangan guna menghasilkan inovasi yang mendukung pengembangan kehidupan bermasyarakat, khususnya di bidang sistem informasi.</p><p>3. Menyiapkan lulusan di bidang sistem informasi yang siap bekerja sekaligus memiliki kemampuan berwirausaha.</p><p>4. Mengembangkan pendidikan sistem informasi yang mengedepankan pengembangan karakter di bidang kepemimpinan yang berwawasan global.</p>",
        ]);

        Setting::create([
            'key' => 'history',
            'value' => "STMIK KUWERA was founded on December 17, 1987. In 2014, STMIK Kuwera relocated and is currently changing its name to STMIK HARVEST.",
        ]);

        Setting::create([
            'key' => 'history_idn',
            'value' => "STMIK KUWERA didirikan pada 17 Desember 1987. Pada tahun 2014, STMIK Kuwera melakukan relokasi dan sedang melakukan peberubahan nama menjadi STMIK HARVEST.",
        ]);
    }
}
