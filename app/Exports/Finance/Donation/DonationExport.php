<?php

namespace App\Exports\Finance\Donation;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DonationExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public $title = 'Donation';

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('cms.livewire.finance.donation.donation.excel', [
            'title' => $this->title,
            'donations' => $this->data,
        ]);
    }
}
