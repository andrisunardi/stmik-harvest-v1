<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProcedureExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Procedure';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.procedure.excel', [
            'title' => $this->title,
            'procedures' => $this->data,
        ]);
    }
}
