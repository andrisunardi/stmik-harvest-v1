<?php

namespace App\Exports\Finance\Withdraw;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WithdrawCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Withdraw Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.withdraw.withdraw-category.excel', [
            'title' => $this->title,
            'withdrawCategories' => $this->data,
        ]);
    }
}
