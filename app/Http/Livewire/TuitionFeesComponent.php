<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\TuitionFee;

class TuitionFeesComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(10);
    }

    public function getTuitionFees()
    {
        return TuitionFee::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.tuition-fees.index', [
            'tuitionFees' => $this->getTuitionFees(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
