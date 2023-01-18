<?php

namespace App\Http\Livewire\CMS;

class ServerTimeComponent extends Component
{
    public function render()
    {
        return view('cms.layouts.server-time')->section('content');
    }
}
