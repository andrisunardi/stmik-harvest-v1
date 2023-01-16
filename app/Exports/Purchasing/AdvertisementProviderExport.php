<?php

namespace App\Exports\Purchasing;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdvertisementProviderExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Advertisement Provider';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.purchasing.advertisement-provider.excel', [
            'title' => $this->title,
            'advertisementProviders' => $this->data,
        ]);
    }
}
