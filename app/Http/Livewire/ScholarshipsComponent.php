<?php

namespace App\Http\Livewire;

use App\Models\Banner;

class ScholarshipsComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(11);
    }

    public function render()
    {
        return view('livewire.scholarships.index', [
            'banner' => $this->getBanner(),
        ])->extends('layouts.app')->section('content');
    }
}
