<?php

namespace App\Exports\Configuration;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PermissionExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Permission';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.configuration.permission.excel', [
            'title' => $this->title,
            'permissions' => $this->data,
        ]);
    }
}
