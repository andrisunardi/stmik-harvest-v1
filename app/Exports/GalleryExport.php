<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GalleryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Gallery';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.marketing.gallery.excel', [
            'title' => $this->title,
            'galleries' => $this->data,
        ]);
    }
}
