<?php

namespace App\Http\Livewire\CMS\Development\Product;

use App\Http\Livewire\CMS\Component;

class ProductCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.product.category')->extends('layouts.app')->section('content');
    }
}
