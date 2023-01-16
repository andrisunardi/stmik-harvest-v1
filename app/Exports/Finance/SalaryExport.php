<?php

namespace App\Exports\Finance;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalaryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Salary';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.salary.excel', [
            'title' => $this->title,
            'salaries' => $this->data,
        ]);
    }
}
