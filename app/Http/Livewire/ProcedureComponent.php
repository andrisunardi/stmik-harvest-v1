<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Procedure;

class ProcedureComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(9);
    }

    public function getProcedures()
    {
        return Procedure::active()->latest('id')->get();
    }

    public function render()
    {
        return view('livewire.procedure.index', [
            'banner' => $this->getBanner(),
            'networks' => $this->getNetworks(),
            'values' => $this->getValues(),
        ])->extends('layouts.app')->section('content');
    }
}
