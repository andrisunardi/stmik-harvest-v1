<?php

namespace App\Http\Livewire;

class BlogViewComponent extends Component
{
    public function render()
    {
        return view('livewire.blog.view')->extends('layouts.app')->section('content');
    }
}
