<?php

namespace App\Http\Livewire;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart.index')->extends('layouts.app')->section('content');
    }
}
