<?php

namespace App\Exports\Development\Product;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Product Category';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.development.product.product-category.excel', [
            'title' => $this->title,
            'productCategories' => $this->data,
        ]);
    }
}
