<?php

namespace App\Http\Livewire\CMS\Hrd\Procedure;

use App\Http\Livewire\CMS\Component;

class ProcedureComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.procedure.index')->extends('layouts.app')->section('content');
    }
}
