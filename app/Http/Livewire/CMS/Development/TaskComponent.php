<?php

namespace App\Http\Livewire\CMS\Development;

use App\Http\Livewire\CMS\Component;

class TaskComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.task.index')->extends('layouts.app')->section('content');
    }
}
