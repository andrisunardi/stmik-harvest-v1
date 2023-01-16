<?php

namespace App\Http\Livewire;

use App\Models\PriceList;

class PriceListComponent extends Component
{
    public function getPriceLists()
    {
        return PriceList::active()->orderBy('id')->get();
    }

    public function render()
    {
        return view('livewire.price-list.index', [
            'priceLists' => $this->getPriceLists(),
        ])->extends('layouts.app')->section('content');
    }
}
