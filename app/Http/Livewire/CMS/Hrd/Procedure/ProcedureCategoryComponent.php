<?php

namespace App\Http\Livewire\CMS\Hrd\Procedure;

use App\Http\Livewire\CMS\Component;

class ProcedureCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.procedure.category')->extends('layouts.app')->section('content');
    }
}
