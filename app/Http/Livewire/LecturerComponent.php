<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Lecturer;

class LecturerComponent extends Component
{
    public $menu_name = "Lecturer";
    public $menu_icon = "fas fa-users";
    public $menu_slug = "lecturer";
    public $menu_table = "lecturer";

    public function mount()
    {
        $this->banner = Banner::find(2);

        $this->data_lecturer = Lecturer::onlyActive()->orderBy("id")->get();

        $this->data_lecturer_category = Lecturer::onlyActive()->groupBy("job")->orderBy("job")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
