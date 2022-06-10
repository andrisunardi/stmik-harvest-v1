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
        $data->name = "Orientation";
        $data->name_id = "Orientasi";
        $data->description = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
        $data->description_id = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, dolor molestias? Debitis ullam odit voluptates, fuga sed ab eveniet ratione quam, consequuntur nostrum ducimus deleniti repellendus eum incidunt odio exercitationem?";
        $data->slug = Str::slug($data->name);
        $data->save();
    }
}
