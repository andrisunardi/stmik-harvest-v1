<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BannerExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Banner';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.banner.excel', [
            'title' => $this->title,
            'banners' => $this->data,
        ]);
    }
}
