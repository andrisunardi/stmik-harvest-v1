<?php

namespace App\Exports\Finance;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BankExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Bank';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.bank.excel', [
            'title' => $this->title,
            'banks' => $this->data,
        ]);
    }
}
