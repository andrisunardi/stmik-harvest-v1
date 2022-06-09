<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i < 5; $i++) {
            $data = new Blog();
            $data->news_category_id = 1;
            $data->name = "Welcome To Our Website {$i}";
            $data->name_id = "Selamat Datang Di Website Kami {$i}";
            $data->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
            $data->description_id = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
            $data->tag = "news, event, hits, university";
            $data->tag_id = "berita, kegiatan, hits, universitas";
            $data->date = now()->format("Y-m-d");
            $data->image = Str::slug($data->name) . ".png";
            $data->slug = Str::slug($data->name);
            $data->save();
        }
    }
}
