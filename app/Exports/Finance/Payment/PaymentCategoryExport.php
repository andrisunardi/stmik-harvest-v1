<?php

namespace App\Exports\Finance\Payment;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PaymentCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Payment Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.payment.payment-category.excel', [
            'title' => $this->title,
            'paymentCategories' => $this->data,
        ]);
    }
}
