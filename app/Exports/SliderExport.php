<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SliderExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Slider';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.slider.excel', [
            'title' => $this->title,
            'sliders' => $this->data,
        ]);
    }
}
