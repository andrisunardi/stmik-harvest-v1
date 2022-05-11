<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component as LivewireComponent;

class Component extends LivewireComponent
{
    public function message(string $message)
    {
        Session::flash("message", $message);
    }
}
