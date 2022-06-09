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
        $data->name = "New Student Orientation 2015/2016";
        $data->name_id = "Orientasi Mahasiswa Baru 2015/2016";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "Gedung World Harvest Center, International Room.";
        $data->start = "2015-09-19 08:00:00";
        $data->end = "2015-09-19 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "TEST";
        $data->name_id = "TEST";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "TEST";
        $data->name_id = "TEST";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "TEST";
        $data->name_id = "TEST";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "TEST";
        $data->name_id = "TEST";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "TEST";
        $data->name_id = "TEST";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "TEST";
        $data->name_id = "TEST";
        $data->description = "TEST";
        $data->description_id = "TEST";
        $data->location = "STMIK Harvest, Gedung World Harvest Center, International Room";
        $data->start = "2017-09-09 08:00:00";
        $data->end = "2017-09-10 17:00:00";
        $data->image = Str::slug($data->name) . ".png";
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new Event();
        $data->name = "";
        $data->name_id = "Orientasi Mahasiswa Baru 2017/2018";
        $data->description = "";
        $data->description_id = "Orientasi Mahasiswa Baru untuk mahasiswa STMIK Harvest Sistem Informasi Tahun Ajaran 2017/2018 berlangsung pada tanggal 9 Sept 2017.<br>
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
