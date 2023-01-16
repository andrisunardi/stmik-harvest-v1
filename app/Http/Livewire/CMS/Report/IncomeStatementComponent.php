<?php

namespace App\Http\Livewire\CMS\Report;

use App\Http\Livewire\CMS\Component;
use App\Models\BuyDomainHosting;
use App\Models\Payment;
use App\Models\Portfolio;
use Illuminate\Support\Str;

class IncomeStatementComponent extends Component
{
    public $pageName;

    public $pageTitle;

    public $pageSlug;

    public $pageIcon;

    public $pageTable;

    public $pageCategoryName;

    public $pageCategoryTitle;

    public $pageCategorySlug;

    public $pageSubCategoryName;

    public $pageSubCategoryTitle;

    public $pageSubCategorySlug;

    public function boot()
    {
        $this->pageName = 'Income Statement';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-file-invoice-dollar';
        $this->pageTable = null;
        $this->pageCategoryName = 'Report';
        $this->pageCategoryTitle = trans('index.'.Str::snake($this->pageCategoryName));
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $readyToLoad = false;

    public $portfolios_id = [];

    public $start_date;

    public $end_date;

    public $queryString = [
        'portfolios_id' => ['except' => []],
        'start_date' => ['except' => ''],
        'end_date' => ['except' => ''],
    ];

    public function loadData()
    {
        $this->readyToLoad = true;

        $this->alert('info', trans('index.data_have_been_loaded_successfully'));
    }

    public function mount()
    {
        $this->start_date = now()->firstOfYear()->format('Y-m-d');
        $this->end_date = now()->endOfYear()->format('Y-m-d');
    }

    public function resetFilter()
    {
        $this->reset([
            'portfolios_id',
            'start_date',
            'end_date',
        ]);

        $this->alert('info', trans('index.reset_filter'));
    }

    public function refresh()
    {
        $this->resetValidation();
        $this->alert('info', trans('index.refresh'));
    }

    public function updating($name, $value)
    {
        $this->resetPage();
        $this->alert('info', trans('index.updating').' '.trans("validation.attributes.{$name}").' : '.json_encode($value));
    }

    public function updated($name, $value)
    {
        $this->resetPage();
        $this->alert('info', trans('index.updated').' '.trans("validation.attributes.{$name}").' : '.json_encode($value));
    }

    public function getPortfolios()
    {
        return Portfolio::active()->orderBy('name')->get();
    }

    public function getPayments()
    {
        return Payment::with('portfolio')
            ->when($this->portfolios_id, fn ($q) => $q->whereIn('portfolio_id', $this->portfolios_id))
            ->when($this->start_date, fn ($q) => $q->whereDate('datetime', '>=', $this->start_date))
            ->when($this->end_date, fn ($q) => $q->whereDate('datetime', '<=', $this->end_date))
            ->active()
            ->orderBy('datetime')
            ->get();
    }

    public function getBuyDomainHostings()
    {
        return BuyDomainHosting::with('portfolio')
            ->when($this->portfolios_id, fn ($q) => $q->whereIn('portfolio_id', $this->portfolios_id))
            ->when($this->start_date, fn ($q) => $q->whereDate('datetime', '>=', $this->start_date))
            ->when($this->end_date, fn ($q) => $q->whereDate('datetime', '<=', $this->end_date))
            ->active()
            ->orderBy('datetime')
            ->get();
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}.index", [
            'portfolios' => $this->readyToLoad ? $this->getPortfolios() : collect(),
            'payments' => $this->readyToLoad ? $this->getPayments() : collect(),
            'buyDomainHostings' => $this->readyToLoad ? $this->getBuyDomainHostings() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
