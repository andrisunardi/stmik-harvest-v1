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
        New Student Orientation for STMIK Harvest Information System students for the 2015/2016 Academic Year took place on 19 September 2015.<br>
        <br>
        Welcoming new students who join STMIK Harvest and providing supplies that are deemed necessary for future lectures.<br>
        <br>
        This student orientation is carried out with a series of activities, including:
        <ul>
        <li>Introduction of the departments and personnel in STMIK Harvest</li>
        <li>Games</li>
        <li>Updated skills and strategies</li>
        </ul>
        <br>
        Seminar series such as:<br>
        <ul>
        <li>Vision & Mission Presentation</li>
        <li>Leadership training</li>
        <li>Life Goals & Setting</li>
        <li>How to study</li>
        <li>Academic Overview</li>
        </ul>
        ";
        $data->description_id = "
        Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2015/2016 berlangsung pada tanggal 19 Sept 2015.<br>
        <br>
        Menyambut mahasiswa baru yang bergabung dengan STMIK Harvest dan memberikan pembekalan yang dirasa perlu untuk perkuliahan nantinya.<br>
        <br>
        Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain:
        <ul>
        <li>Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest</li>
        <li>Games</li>
        <li>Updated skills and strategies</li>
        </ul>
        <br>
        Rangkaian Seminar seperti:<br>
        <ul>
        <li>Pemaparan Visi & Misi</li>
        <li>Leadership training</li>
        <li>Life Goal & Setting</li>
        <li>How to Study</li>
        <li>Academic Overview</li>
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

        // $data = new Event();
        // $data->name = "TEST";
        // $data->name_id = "TEST";
        // $data->description = "TEST";
        // $data->description_id = "TEST";
        // $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        // $data->start = "2017-09-09 08:00:00";
        // $data->end = "2017-09-10 17:00:00";
        // $data->image = Str::slug($data->name) . ".png";
        // $data->slug = Str::slug($data->name);
        // $data->save();

        // $data = new Event();
        // $data->name = "TEST";
        // $data->name_id = "TEST";
        // $data->description = "TEST";
        // $data->description_id = "TEST";
        // $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        // $data->start = "2017-09-09 08:00:00";
        // $data->end = "2017-09-10 17:00:00";
        // $data->image = Str::slug($data->name) . ".png";
        // $data->slug = Str::slug($data->name);
        // $data->save();

        // $data = new Event();
        // $data->name = "TEST";
        // $data->name_id = "TEST";
        // $data->description = "TEST";
        // $data->description_id = "TEST";
        // $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        // $data->start = "2017-09-09 08:00:00";
        // $data->end = "2017-09-10 17:00:00";
        // $data->image = Str::slug($data->name) . ".png";
        // $data->slug = Str::slug($data->name);
        // $data->save();

        // $data = new Event();
        // $data->name = "TEST";
        // $data->name_id = "TEST";
        // $data->description = "TEST";
        // $data->description_id = "TEST";
        // $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        // $data->start = "2017-09-09 08:00:00";
        // $data->end = "2017-09-10 17:00:00";
        // $data->image = Str::slug($data->name) . ".png";
        // $data->slug = Str::slug($data->name);
        // $data->save();

        // $data = new Event();
        // $data->name = "TEST";
        // $data->name_id = "TEST";
        // $data->description = "TEST";
        // $data->description_id = "TEST";
        // $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        // $data->start = "2017-09-09 08:00:00";
        // $data->end = "2017-09-10 17:00:00";
        // $data->image = Str::slug($data->name) . ".png";
        // $data->slug = Str::slug($data->name);
        // $data->save();

        // $data = new Event();
        // $data->name = "TEST";
        // $data->name_id = "TEST";
        // $data->description = "TEST";
        // $data->description_id = "TEST";
        // $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        // $data->start = "2017-09-09 08:00:00";
        // $data->end = "2017-09-10 17:00:00";
        // $data->image = Str::slug($data->name) . ".png";
        // $data->slug = Str::slug($data->name);
        // $data->save();

        $data = new Event();
        $data->name = "New Student Orientation 2017/2018";
        $data->name_id = "Orientasi Mahasiswa Baru 2017/2018";
        $data->description = "
        New Student Orientation for STMIK Harvest Information System students for the 2017/2018 academic year took place on 9 September 2017.<br>
        <br>
        This student orientation is carried out with a series of activities, including:<br>
        <ul>
        <li>Matriculation to support students who still need additional lessons</li>
        <li>Introduction of the departments and personnel in STMIK Harvest</li>
        <li>Games to strengthen new students</li>
        </ul>
        <br>
        Seminar series such as:<br>
        <ul>
        <li>Seminar on character</li>
        <li>Seminar on creative thinking and beyond</li>
        <li>Seminar to dare to fail</li>
        <li>Seminar to dare to try new things</li>
        </ul>
        ";
        $data->description_id = "
        Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2017/2018 berlangsung pada tanggal 9 Sept 2017.<br>
        <br>
        Orientasi mahasiswa ini dilakukan dengan serangkaian kegiatan antara lain:<br>
        <ul>
        <li>Matrikulasi untuk menunjang para mahasiswa yang masih memerlukan pelajaran tambahan</li>
        <li>Perkenalan dari departemen dan personel yang ada di dalam STMIK Harvest</li>
        <li>Games untuk mempererat mahasiswa baru</li>
        </ul>
        <br>
        Rangkaian Seminar seperti:<br>
        <ul>
        <li>Seminar mengenai karakter</li>
        <li>Seminar mengenai berpikir kreatif dan diluar batasan</li>
        <li>Seminar untuk berani gagal</li>
        <li>Seminar untuk berani mencoba hal-hal baru</li>
        </ul>
        ";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
