<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AdmissionCalendarExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Admission Calendar';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.admission-calendar.excel', [
            'title' => $this->title,
            'admissionCalendars' => $this->data,
        ]);
    }
}
