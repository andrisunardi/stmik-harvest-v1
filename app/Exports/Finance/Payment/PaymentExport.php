<?php

namespace App\Exports\Finance\Payment;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaymentExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Payment';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.payment.payment.excel', [
            'title' => $this->title,
            'payments' => $this->data,
        ]);
    }
}
