<?php

namespace App\Exports\Other;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FaqExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Faq';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.other.faq.excel', [
            'title' => $this->title,
            'faqs' => $this->data,
        ]);
    }
}
