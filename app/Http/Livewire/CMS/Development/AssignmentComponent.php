<?php

namespace App\Http\Livewire\CMS\Development;

use App\Http\Livewire\CMS\Component;

class AssignmentComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.assignment.index')->extends('layouts.app')->section('content');
    }
}
