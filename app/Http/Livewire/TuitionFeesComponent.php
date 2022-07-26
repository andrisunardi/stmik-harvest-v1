<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\TuitionFee;

class TuitionFeesComponent extends Component
{
    public $menu_name = 'Tuition Fees';

    public $menu_icon = 'fas fa-money';

    public $menu_slug = 'tuition-fees';

    public $menu_table = 'tuition_fee';

    public function mount()
    {
        $this->banner = Banner::find(10);

        $this->data_tuition_fee = TuitionFee::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")->extends('layouts.app', ['banner' => $this->banner])->section('content');
    }
}
