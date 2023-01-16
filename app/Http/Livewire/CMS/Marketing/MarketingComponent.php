<?php

namespace App\Http\Livewire\CMS\Marketing;

use App\Http\Livewire\CMS\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Forum;
use App\Models\ForumCategory;
use App\Models\Game;
use App\Models\GameCategory;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Platform;
use App\Models\PriceList;
use App\Models\Promotion;
use App\Models\Service;
use Illuminate\Support\Str;

class MarketingComponent extends Component
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
        $this->pageName = 'Marketing';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-bullhorn';
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
            'name' => trans('index.news'),
            'icon' => 'fas fa-newspaper fa-fw',
            'total' => News::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.news.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.news_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => NewsCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.news.category.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.blog'),
            'icon' => 'fas fa-note-sticky fa-fw',
            'total' => Blog::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.blog.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.blog_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => BlogCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.blog.category.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.game'),
            'icon' => 'fas fa-gamepad fa-fw',
            'total' => Game::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.game.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.game_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => GameCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.game.category.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.job'),
            'icon' => 'fas fa-suitcase fa-fw',
            'total' => Job::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.job.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.job_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => JobCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.job.category.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.forum'),
            'icon' => 'fas fa-comment-dots fa-fw',
            'total' => Forum::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.forum.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.forum_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => ForumCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.forum.category.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.order'),
            'icon' => 'fas fa-cart-shopping fa-fw',
            'total' => Order::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.order.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.contact'),
            'icon' => 'fas fa-phone fa-fw',
            'total' => Contact::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.contact.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.promotion'),
            'icon' => 'fas fa-gift fa-fw',
            'total' => Promotion::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.promotion.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.price_list'),
            'icon' => 'fas fa-list-ol fa-fw',
            'total' => PriceList::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.price-list.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.newsletter'),
            'icon' => 'fas fa-envelopes-bulk fa-fw',
            'total' => Newsletter::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.newsletter.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.platform'),
            'icon' => 'fas fa-circle-check fa-fw',
            'total' => Platform::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.platform.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.service'),
            'icon' => 'fas fa-wrench fa-fw',
            'total' => Service::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.service.index"),
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
