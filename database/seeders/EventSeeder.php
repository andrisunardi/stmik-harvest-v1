<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run()
    {
        $data = new Event();
        $data->event_category_id = 1;
        $data->name = "New Student Orientation 2015/2016";
        $data->name_id = "Orientasi Mahasiswa Baru 2015/2016";
        $data->description = "
        <p>New Student Orientation for STMIK Harvest Information System students for the 2015/2016 Academic Year took place on 19 September 2015.</p>
        <p>Welcoming new students who join STMIK Harvest and providing supplies that are deemed necessary for future lectures.</p>
        <p><b>This student orientation is carried out with a series of activities, including :</b></p>
        <ul>
            <li>1. Introduction of the departments and personnel in STMIK Harvest</li>
            <li>2. Games</li>
            <li>3. Updated skills and strategies</li>
        </ul>
        <p><b>Seminar series such as:</b></p>
        <ul>
            <li>1. Vision & Mission Presentation</li>
            <li>2. Leadership training</li>
            <li>3. Life Goals & Setting</li>
            <li>4. How to study</li>
            <li>5. Academic Overview</li>
        </ul>
        ";
        $data->description_id = "
        <p>Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2015/2016 berlangsung pada tanggal 19 Sept 2015.</p>
        <p>Menyambut mahasiswa baru yang bergabung dengan STMIK Harvest dan memberikan pembekalan yang dirasa perlu untuk perkuliahan nantinya.</p>
        <p><b>Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain :</b></p>
        <ul>
            <li>1. Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest</li>
            <li>2. Games</li>
            <li>3. Keterampilan dan strategi yang diperbarui</li>
        </ul>
        <p><b>Rangkaian Seminar seperti:</b></p>
        <ul>
            <li>1. Pemaparan Visi & Misi</li>
            <li>2. Leadership training</li>
            <li>3. Life Goal & Setting</li>
            <li>4. How to Study</li>
            <li>5. Academic Overview</li>
        </ul>
        ";
        $data->location = "Gedung World Harvest Center, International Room.";
        $data->start = "2015-09-19 08:00:00";
        $data->end = "2015-09-19 17:00:00";
        $data->tag = "Orientation";
        $data->tag_id = "Orientasi";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 2;
        $data->name = "Community Service";
        $data->name_id = "Pengabdian Kepada Masyarakat";
        $data->description = "
        <p>Community Service (PKM) which is held to carry out the tridharma of higher education by presenting a seminar with the theme 'Social Media 101'</p>
        <p>Give parents and teachers an idea of how social media is in our midst, and parents are encouraged to understand their children's activities.</p>
        <p><b>What We Do :</b></p>
        <ul>
            <li>>1. Seminar on Social Media 101 is a seminar that aims to provide a basic overview for parents or teachers who do not really understand about the internet and social media. The team from STMIK Harvest gave an explanation and also an explanation of the functions, advantages and disadvantages of the internet and social media, as well as what social media is already in the midst of our children today</li>
            <li>2. The seminar was also continued with additional explanations about child psychology which aims to make parents or teachers understand how children behave.</li>
        </ul>
        ";
        $data->description_id = "
        <p>Pengabdian Kepada Masyarakat (PKM) yang diselenggarakan untuk menjalankan tridarma perguruan tinggi dengan membawakan seminar bertema 'Social Media 101'</p>
        <p>Memberikan gambaran kepada orang tua dan guru tentang bagaimana social media sudah ada ditengah-tengah kita, dan orang-tua dihimbau untuk bisa memahami kegiatan anak-anak mereka.</p>
        <p><b>Apa Yang Kita Lakukan :</b></p>
        <ul>
            <li>>1. Seminar Social Media 101 adalah seminar yang bertujuan untuk memberikan gambaran dasar bagi para orang tua ataupun guru yang belum begitu memahami tentang internet dan social media. Tim dari STMIK Harvest memberikan pemaparan dan juga penjelasan mengenai fungsi, kelebihan dan kekurangan dari internet dan social media, serta social media apa saja yang sudah ada di tengah-tengah anak-anak kita saat ini</li>
            <li>2. Seminar dilanjutkan juga dengan penjelasan tambahan mengenai psikologi anak yang bertujuan agar para orang tua ataupun guru dapat memahami bagaimana perilaku dari pada anak-anak.</li>
        </ul>
        ";
        $data->location = "Sekolah Wahana Harapan Kampung Melayu";
        $data->start = "2015-09-01 09:00:00";
        $data->end = "2015-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->event_category_id = 1;
        $data->name = "New Student Orientation 2017/2018";
        $data->name_id = "Orientasi Mahasiswa Baru 2017/2018";
        $data->description = "
        <p>New Student Orientation for STMIK Harvest Information System students for the 2017/2018 academic year took place on 9 September 2017.</p>
        <p><b>This student orientation is carried out with a series of activities, including:</b></p>
        <ul>
            <li>1. Matriculation to support students who still need additional lessons</li>
            <li>2. Introduction of the departments and personnel in STMIK Harvest</li>
            <li>3. Games to strengthen new students</li>
        </ul>
        <p><b>Seminar series such as:</b></p>
        <ul>
            <li>1. Seminar on character</li>
            <li>2. Seminar on creative thinking and beyond</li>
            <li>3. Seminar to dare to fail</li>
            <li>4. Seminar to dare to try new things</li>
        </ul>
        ";
        $data->description_id = "
        <p>Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2017/2018 berlangsung pada tanggal 9 Sept 2017.</p>
        <p><b>Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain:</b></p>
        <ul>
            <li>1. Matrikulasi untuk menunjang para mahasiswa yang masih memerlukan pelajaran tambahan</li>
            <li>2. Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest</li>
            <li>3. Games untuk mempererat mahasiswa baru</li>
        </ul>
        <p><b>Rangkaian Seminar seperti:</b></p>
        <ul>
            <li>1. Seminar mengenai karakter</li>
            <li>2. Seminar mengenai berpikir kreatif dan diluar batasan</li>
            <li>3. Seminar untuk berani gagal</li>
            <li>4. Seminar untuk berani mencoba hal-hal baru</li>
        </ul>
        ";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->tag = "Orientation";
        $data->tag_id = "Orientasi";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
