<?php

namespace App\Http\Livewire\CMS\Development;

use App\Http\Livewire\CMS\Component;
use App\Models\Assignment;
use App\Models\Framework;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioDislike;
use App\Models\PortfolioLike;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Progress;
use App\Models\Revision;
use App\Models\Task;
use App\Models\Template;
use App\Models\TemplateCategory;
use Illuminate\Support\Str;

class DevelopmentComponent extends Component
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
        $this->pageName = 'Development';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-tools';
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
            'name' => trans('index.portfolio'),
            'icon' => 'fas fa-th-large fa-fw',
            'total' => Portfolio::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.portfolio.index"),
        ], [
            'name' => trans('index.portfolio_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => PortfolioCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.portfolio.category.index"),
        ], [
            'name' => trans('index.portfolio_like'),
            'icon' => 'fas fa-thumbs-up fa-fw',
            'total' => PortfolioLike::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.portfolio.like.index"),
        ], [
            'name' => trans('index.portfolio_dislike'),
            'icon' => 'fas fa-thumbs-down fa-fw',
            'total' => PortfolioDislike::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.portfolio.dislike.index"),
        ], [
            'name' => trans('index.product'),
            'icon' => 'fas fa-boxes fa-fw',
            'total' => Product::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.product.index"),
        ], [
            'name' => trans('index.product_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => ProductCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.product.category.index"),
        ], [
            'name' => trans('index.template'),
            'icon' => 'fas fa-cubes fa-fw',
            'total' => Template::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.template.index"),
        ], [
            'name' => trans('index.template_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => TemplateCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.template.category.index"),
        ], [
            'name' => trans('index.task'),
            'icon' => 'fas fa-tasks fa-fw',
            'total' => Task::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.task.index"),
        ], [
            'name' => trans('index.assignment'),
            'icon' => 'fas fa-square-check fa-fw',
            'total' => Assignment::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.assignment.index"),
        ], [
            'name' => trans('index.progress'),
            'icon' => 'fas fa-bars-progress fa-fw',
            'total' => Progress::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.progress.index"),
        ], [
            'name' => trans('index.revision'),
            'icon' => 'fas fa-file-circle-check fa-fw',
            'total' => Revision::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.revision.index"),
        ], [
            'name' => trans('index.framework'),
            'icon' => 'fas fa-screwdriver-wrench fa-fw',
            'total' => Framework::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.framework.index"),
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
