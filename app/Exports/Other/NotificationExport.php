<?php

namespace App\Exports\Other;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NotificationExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Notification';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.other.notification.excel', [
            'title' => $this->title,
            'notifications' => $this->data,
        ]);
    }
}
