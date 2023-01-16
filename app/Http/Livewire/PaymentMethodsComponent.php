<?php

namespace App\Http\Livewire;

class PaymentMethodsComponent extends Component
{
    public function render()
    {
        return view('livewire.payment-methods.index')->extends('layouts.app')->section('content');
    }
}
