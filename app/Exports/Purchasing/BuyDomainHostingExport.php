<?php

namespace App\Exports\Purchasing;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BuyDomainHostingExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Buy Domain Hosting';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.purchasing.buy-domain-hosting.excel', [
            'title' => $this->title,
            'buyDomainHostings' => $this->data,
        ]);
    }
}
