<?php

namespace App\Http\Livewire;

use App\Models\News;
use App\Models\Portfolio;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $search;

    public $queryString = [
        'search' => ['except' => ''],
    ];

    public function getPortfolios()
    {
        return Portfolio::with('portfolioCategory')->when($this->search, fn ($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->publish()->active()->orderBy('name')->get();
    }

    public function getNews()
    {
        return News::with('newsCategory')->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->active()->orderBy('title')->get();
    }

    public function getTotalSearch()
    {
        return $this->getPortfolios()->count() + $this->getNews()->count();
    }

    public function render()
    {
        return view('livewire.search.index', [
            'totalSearch' => $this->getTotalSearch(),
            'portfolios' => $this->getPortfolios(),
            'news' => $this->getNews(),
        ])->extends('layouts.app')->section('content');
    }
}
