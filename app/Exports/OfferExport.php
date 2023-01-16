<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OfferExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Offer';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.offer.excel', [
            'title' => $this->title,
            'offers' => $this->data,
        ]);
    }
}
