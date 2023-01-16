<?php

namespace App\Exports\Other;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DocumentationExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Documentation';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.other.documentation.excel', [
            'title' => $this->title,
            'documentations' => $this->data,
        ]);
    }
}
