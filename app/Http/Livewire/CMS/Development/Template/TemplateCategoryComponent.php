<?php

namespace App\Http\Livewire\CMS\Development\Template;

use App\Http\Livewire\CMS\Component;

class TemplateCategoryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.template.category')->extends('layouts.app')->section('content');
    }
}
