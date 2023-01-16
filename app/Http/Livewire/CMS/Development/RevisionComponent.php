<?php

namespace App\Http\Livewire\CMS\Development;

use App\Http\Livewire\CMS\Component;

class RevisionComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.revision.index')->extends('layouts.app')->section('content');
    }
}
