<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class AgentComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.agent.index')->extends('layouts.app')->section('content');
    }
}
