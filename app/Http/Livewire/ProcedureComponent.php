<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\Procedure;

class ProcedureComponent extends Component
{
    public $menu_name = "Procedure";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "procedure";
    public $menu_table = "procedure";

    public function mount()
    {
        $this->banner = Banner::find(9);

        $this->data_procedure = Procedure::onlyActive()->orderBy("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
