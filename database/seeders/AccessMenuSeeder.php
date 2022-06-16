<?php

namespace Database\Seeders;

use App\Models\AccessMenu;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class AccessMenuSeeder extends Seeder
{
    public function run()
    {
        $data_menu = Menu::active()->orderBy("id")->get();

        foreach ($data_menu as $menu) {
            $data = new AccessMenu();
            $data->access_id = "2";
            $data->menu_id = $menu->id;
            $data->view = "1";
            $data->add = "1";
            $data->edit = "1";
            $data->delete = "1";
            $data->save();
        }
    }
}
