<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NetworkExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Network';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.network.excel', [
            'title' => $this->title,
            'networks' => $this->data,
        ]);
    }
}
