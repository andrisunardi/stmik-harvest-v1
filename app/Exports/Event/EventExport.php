<?php

namespace App\Exports\Event;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EventExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Event';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.event.event.excel', [
            'title' => $this->title,
            'events' => $this->data,
        ]);
    }
}
