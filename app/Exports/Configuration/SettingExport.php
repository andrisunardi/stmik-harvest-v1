<?php

namespace App\Exports\Configuration;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SettingExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Setting';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.configuration.setting.excel', [
            'title' => $this->title,
            'settings' => $this->data,
        ]);
    }
}
