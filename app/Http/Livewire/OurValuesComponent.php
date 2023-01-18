<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Value;

class OurValuesComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(4);
    }

    public function getValues()
    {
        return Value::active()->latest('id')->get();
    }

    public function render()
    {
        return view('livewire.our-values.index', [
            'banner' => $this->getBanner(),
            'values' => $this->getValues(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
