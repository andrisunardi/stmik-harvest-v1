<?php

namespace App\Http\Livewire\CMS\Report;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Str;

class ReportComponent extends Component
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
        $this->pageName = 'Report';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-file-lines';
        $this->pageTable = null;
        $this->pageCategoryName = null;
        $this->pageCategoryTitle = null;
        $this->pageCategorySlug = null;
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public function getBgClass()
    {
        return collect(['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-secondary']);
    }

    public function getPages()
    {
        return collect([[
            'class' => 'primary',
            'name' => trans('index.absent_report'),
            'icon' => 'fas fa-file-circle-check fa-fw',
            'url' => route("{$this->subDomain}.{$this->pageSlug}.absent-report.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.annual_report'),
            'icon' => 'fas fa-file-signature fa-fw',
            'url' => route("{$this->subDomain}.{$this->pageSlug}.annual-report.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.balance_sheet'),
            'icon' => 'fas fa-file-invoice fa-fw',
            'url' => route("{$this->subDomain}.{$this->pageSlug}.balance-sheet.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.income_statement'),
            'icon' => 'fas fa-file-invoice-dollar fa-fw',
            'url' => route("{$this->subDomain}.{$this->pageSlug}.income-statement.index"),
        ]]);
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageSlug}.index", [
            'bgClass' => $this->getBgClass(),
            'pages' => $this->getPages(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
