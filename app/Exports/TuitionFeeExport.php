<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TuitionFeeExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Tuition Fee';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.tuition-fee.excel', [
            'title' => $this->title,
            'tuitionFees' => $this->data,
        ]);
    }
}
