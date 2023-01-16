<?php

namespace App\Http\Livewire\CMS\Development\Template;

use App\Http\Livewire\CMS\Component;

class TemplateComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.template.index')->extends('layouts.app')->section('content');
    }
}
