<?php

namespace App\Http\Livewire\CMS\Other;

use App\Http\Livewire\CMS\Component;
use App\Models\Documentation;
use App\Models\Faq;
use App\Models\History;
use App\Models\Notification;
use App\Models\Quote;
use Illuminate\Support\Str;

class OtherComponent extends Component
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
        $this->pageName = 'Other';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-database';
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
            'name' => trans('index.history'),
            'icon' => 'fas fa-scroll fa-fw',
            'total' => History::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.history.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.documentation'),
            'icon' => 'fas fa-photo-film fa-fw',
            'total' => Documentation::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.documentation.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.quote'),
            'icon' => 'fas fa-quote-left fa-fw',
            'total' => Quote::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.quote.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.notification'),
            'icon' => 'fas fa-bell fa-fw',
            'total' => Notification::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.notification.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.faq'),
            'icon' => 'fas fa-question-circle fa-fw',
            'total' => Faq::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.faq.index"),
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
