<?php

namespace App\Exports\Development\Template;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TemplateCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Template Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.development.template.template-category.excel', [
            'title' => $this->title,
            'templateCategories' => $this->data,
        ]);
    }
}
