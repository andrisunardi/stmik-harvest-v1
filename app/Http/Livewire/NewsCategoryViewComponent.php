<?php

namespace App\Http\Livewire;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Session;

class NewsCategoryViewComponent extends Component
{
    public $page = 1;

    public $slug;

    public $newsCategory;

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

    public function mount($slug)
    {
        $this->newsCategory = NewsCategory::where('slug', $slug)->active()->first();

        if (! $this->newsCategory) {
            Session::flash('danger', trans('index.news_category').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route('news.category.index');
        }

        $this->page = 1;
    }

    public function getNewss()
    {
        return News::where('news_category_id', $this->newsCategory->id)
            ->active()->latest('id')->limit(8 * $this->page)->get();
    }

    public function render()
    {
        return view('livewire.news.category.view', [
            'newss' => $this->getNewss(),
        ])->extends('layouts.app')->section('content');
    }
}
