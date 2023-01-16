<?php

namespace App\Exports\Finance;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GoogleAdsenseExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Google Adsense';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.google-adsense.excel', [
            'title' => $this->title,
            'googleAdsenses' => $this->data,
        ]);
    }
}
