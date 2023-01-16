<?php

namespace App\Http\Livewire;

use App\Models\News;

class NewsComponent extends Component
{
    public $page = 1;

    public $queryString = [
        'page' => ['except' => 1],
    ];

    public function loadMore()
    {
        $this->page += 1;
    }

    public function resetFilter()
    {
        $this->reset(['page']);
    }

    public function mount()
    {
        $this->page = 1;
    }

    public function getNewss()
    {
        return News::with('newsCategory')->active()->latest('id')->limit(8 * $this->page)->get();
    }

    public function render()
    {
        return view('livewire.news.index', [
            'newss' => $this->getNewss(),
        ])->extends('layouts.app')->section('content');
    }
}
