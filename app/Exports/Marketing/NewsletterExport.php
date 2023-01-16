<?php

namespace App\Exports\Marketing;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NewsletterExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Newsletter';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.marketing.newsletter.excel', [
            'title' => $this->title,
            'newsletters' => $this->data,
        ]);
    }
}
