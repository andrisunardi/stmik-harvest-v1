<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;

class EmployeeComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.employee.index')->extends('layouts.app')->section('content');
    }
}
