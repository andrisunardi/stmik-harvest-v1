<?php

namespace App\Exports\Development\Portfolio;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PortfolioCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Portfolio Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.development.portfolio.portfolio-category.excel', [
            'title' => $this->title,
            'portfolioCategories' => $this->data,
        ]);
    }
}
