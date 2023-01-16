<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RegistrationExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Registration';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.registration.excel', [
            'title' => $this->title,
            'registrations' => $this->data,
        ]);
    }
}
