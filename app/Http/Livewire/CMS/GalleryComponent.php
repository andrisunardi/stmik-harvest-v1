<?php

namespace App\Http\Livewire\CMS;

class GalleryComponent extends Component
{
    public function render()
    {
        return view('cms.livewire.rules.index')->extends('layouts.app')->section('content');
    }
}
