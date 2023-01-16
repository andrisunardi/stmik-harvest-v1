<?php

namespace App\Exports\Purchasing;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BuyAdvertisementExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Buy Advertisement';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.purchasing.buy-advertisement.excel', [
            'title' => $this->title,
            'buyAdvertisements' => $this->data,
        ]);
    }
}
