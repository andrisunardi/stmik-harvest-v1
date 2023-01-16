<?php

namespace App\Http\Livewire;

class OrderComponent extends Component
{
    public function render()
    {
        return view('livewire.order.index')->extends('layouts.app')->section('content');
    }
}
