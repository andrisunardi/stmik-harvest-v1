<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Network;

class OurNetworkComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(5);
    }

    public function getNetworks()
    {
        return Network::active()->latest('id')->get();
    }

    public function render()
    {
        return view('livewire.our-network.index', [
            'networks' => $this->getNetworks(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
