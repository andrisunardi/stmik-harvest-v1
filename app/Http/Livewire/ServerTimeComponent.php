<?php

namespace App\Http\Livewire;

class ServerTimeComponent extends Component
{
    public function render()
    {
        return view('livewire.server-time')->section('content');
    }
}
