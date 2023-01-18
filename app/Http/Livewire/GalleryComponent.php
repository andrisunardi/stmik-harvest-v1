<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Gallery;
use Illuminate\Support\Str;

class GalleryComponent extends Component
{
    public $page = 1;

    public $tag;

    public $queryString = [
        'page' => ['except' => 1],
        'tag' => ['except' => ''],
    ];

    public function getBanner()
    {
        return Banner::find(13);
    }

    public function getCategories()
    {
        return Gallery::groupBy('tag')->active()->orderBy('name')->get();
    }

    public function tag($tag = null)
    {
        $this->tag = $tag;
    }

    public function getGalleries()
    {
        return Gallery::when($this->tag, fn ($query) => $query->where('tag', Str::headline($this->tag))
            ->orWhere('tag_id', Str::headline($this->tag)))
            ->active()
            ->orderBy('id')
            ->paginate(12);
    }

    public function render()
    {
        return view('livewire.faq.index', [
            'banner' => $this->getBanner(),
            'galleries' => $this->getGalleries(),
        ])->extends('layouts.app')->section('content');
    }
}
