<?php

namespace App\Exports\Finance\Withdraw;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WithdrawExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Withdraw';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.donation.withdraw.excel', [
            'title' => $this->title,
            'withdraws' => $this->data,
        ]);
    }
}
