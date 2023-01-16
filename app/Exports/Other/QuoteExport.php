<?php

namespace App\Exports\Other;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class QuoteExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Quote';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.other.quote.excel', [
            'title' => $this->title,
            'quotes' => $this->data,
        ]);
    }
}
