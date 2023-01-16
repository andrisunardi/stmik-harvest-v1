<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventCategorySeeder extends Seeder
{
    public function run()
    {
        $data = new EventCategory();
        $data->name = 'Orientation';
        $data->name_id = 'Orientasi';
        $data->description = 'Welcoming new students who join STMIK Harvest and providing supplies that are deemed necessary for future lectures.';
        $data->description_id = 'Menyambut mahasiswa baru yang bergabung dengan STMIK Harvest dan memberikan pembekalan yang dirasa perlu untuk perkuliahan nantinya.';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new EventCategory();
        $data->name = 'Community Service';
        $data->name_id = 'Pengabdian Kepada Masyarakat';
        $data->description = "Give parents and teachers an idea of how social media is in our midst, and parents are encouraged to understand their children's activities.";
        $data->description_id = 'Memberikan gambaran kepada orang tua dan guru tentang bagaimana social media sudah ada ditengah-tengah kita, dan orang-tua dihimbau untuk bisa memahami kegiatan anak-anak mereka.';
        $data->slug = Str::slug($data->name);
        $data->save();

        $data = new EventCategory();
        $data->name = 'Seminar';
        $data->name_id = 'Seminar';
        $data->description = 'Giving students insight into what computational thinking is and how it can be useful in everyday life.';
        $data->description_id = 'Memberikan pandangan kepada mahasiswa tentang apa itu computational thinking dan bagaimana bisa berguna dalam kehidupan sehari-hari.';
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
