<?php

namespace App\Exports\Configuration;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RoleExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Role';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.configuration.role.excel', [
            'title' => $this->title,
            'roles' => $this->data,
        ]);
    }
}
