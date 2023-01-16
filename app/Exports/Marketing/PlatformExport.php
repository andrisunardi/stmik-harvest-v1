<?php

namespace App\Exports\Marketing;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PlatformExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Platform';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.marketing.platform.excel', [
            'title' => $this->title,
            'platforms' => $this->data,
        ]);
    }
}
