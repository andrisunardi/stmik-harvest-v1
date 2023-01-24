<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Network;
use App\Models\Value;

class AboutComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(2);
    }

    public function getNetworks()
    {
        return Network::active()->latest('id')->get();
    }

    public function getValues()
    {
        return Value::active()->latest('id')->limit(4)->get();
    }

    public function render()
    {
        return view('livewire.about.index', [
            'networks' => $this->getNetworks(),
            'values' => $this->getValues(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
