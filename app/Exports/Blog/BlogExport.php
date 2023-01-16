<?php

namespace App\Exports\Blog;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BlogExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Blog';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.blog.blog.excel', [
            'title' => $this->title,
            'blogs' => $this->data,
        ]);
    }
}
