<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Contact';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.marketing.contact.excel', [
            'title' => $this->title,
            'contacts' => $this->data,
        ]);
    }
}
