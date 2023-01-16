<?php

namespace App\Exports\Marketing\Blog;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BlogCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Blog Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.marketing.blog.blog-category.excel', [
            'title' => $this->title,
            'blogCategories' => $this->data,
        ]);
    }
}
