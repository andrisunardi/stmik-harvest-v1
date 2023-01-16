<?php

namespace App\Http\Livewire;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Session;

class NewsViewComponent extends Component
{
    public $news;

    public function mount($slug)
    {
        $this->news = News::where('slug', $slug)->active()->first();

        if (! $this->news) {
            Session::flash('danger', trans('index.news').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route('news.index');
        }
    }

    public function getNewss()
    {
        return News::where('news_category_id', $this->newsCategory->id)
            ->active()
            ->latest('id')
            ->limit(10)
            ->get();
    }

    public function getNewsCategories()
    {
        return NewsCategory::active()->orderBy('name')->get();
    }

    public function getRelatedNewss()
    {
        return News::where('news_category_id', $this->news->news_category_id)
            ->where('id', '!=', $this->news->id)
            ->active()
            ->inRandomOrder()
            ->limit('8')
            ->get();
    }

    public function render()
    {
        return view('livewire.news.view', [
            'newsCategories' => $this->getNewsCategories(),
            'relatedNewss' => $this->getRelatedNewss(),
        ])->extends('layouts.app')->section('content');
    }
}
