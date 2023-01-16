<?php

namespace App\Exports\Finance;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ChargeExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Charge';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.charge.excel', [
            'title' => $this->title,
            'charges' => $this->data,
        ]);
    }
}
