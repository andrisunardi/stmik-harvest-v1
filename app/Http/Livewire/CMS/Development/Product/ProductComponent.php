<?php

namespace App\Http\Livewire\CMS\Development\Product;

use App\Http\Livewire\CMS\Component;

class ProductComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.product.index')->extends('layouts.app')->section('content');
    }
}
