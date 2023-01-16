<?php

namespace App\Exports\Finance\Deposit;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DepositCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Deposit Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.deposit.deposit-category.excel', [
            'title' => $this->title,
            'depositCategories' => $this->data,
        ]);
    }
}
