<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;

use App\Models\Banner;
use App\Models\FaqCategory;

class FaqComponent extends Component
{
    public $menu_name = "Faq";
    public $menu_icon = "fas fa-question-circle";
    public $menu_slug = "faq";
    public $menu_table = "faq";

    public function mount()
    {
        $this->banner = Banner::find(4);

        $this->data_faq_category = FaqCategory::onlyActive()->orderBy("id")->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
