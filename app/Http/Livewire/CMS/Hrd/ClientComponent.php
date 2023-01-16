<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class ClientComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.client.index')->extends('layouts.app')->section('content');
    }
}
