<?php

namespace App\Http\Livewire;

use App\Models\Banner;

class OurProfileComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(3);
    }

    public function render()
    {
        return view('livewire.our-profile.index', [
            'banner' => $this->getBanner(),
        ])->extends('layouts.app')->section('content');
    }
}
