<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ValueExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Value';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.value.excel', [
            'title' => $this->title,
            'values' => $this->data,
        ]);
    }
}
