<?php

namespace App\Exports\Hrd;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AbsentExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Absent';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.hrd.absent.excel', [
            'title' => $this->title,
            'absents' => $this->data,
        ]);
    }
}
