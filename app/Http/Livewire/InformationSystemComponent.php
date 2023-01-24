<?php

namespace App\Http\Livewire;

use App\Models\Banner;

class InformationSystemComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(12);
    }

    public function render()
    {
        return view('livewire.information-system.index')->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
