<?php

namespace App\Http\Livewire\CMS\Purchasing;

use App\Http\Livewire\CMS\Component;
use App\Models\AdvertisementProvider;
use App\Models\BuyAdvertisement;
use App\Models\BuyDomainHosting;
use App\Models\BuyEndorse;
use App\Models\BuyInternet;
use App\Models\BuyItem;
use App\Models\BuyPhoneCredit;
use App\Models\BuyPlnToken;
use App\Models\DomainHostingProvider;
use App\Models\InternetProvider;
use App\Models\PhoneCreditProvider;
use Illuminate\Support\Str;

class PurchasingComponent extends Component
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
        $this->pageName = 'Purchasing';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-cash-register';
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
            'name' => trans('index.buy_advertisement'),
            'icon' => 'fas fa-bullhorn fa-fw',
            'total' => BuyAdvertisement::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-advertisement.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.advertisement_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => AdvertisementProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.advertisement-provider.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.buy_domain_hosting'),
            'icon' => 'fas fa-server fa-fw',
            'total' => BuyDomainHosting::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-domain-hosting.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.domain_hosting_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => DomainHostingProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.domain-hosting-provider.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.buy_internet'),
            'icon' => 'fas fa-wifi fa-fw',
            'total' => BuyInternet::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-internet.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.internet_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => InternetProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.internet-provider.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.buy_phone_credit'),
            'icon' => 'fas fa-coins fa-fw',
            'total' => BuyPhoneCredit::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-phone-credit.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.phone_credit_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => PhoneCreditProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.phone-credit-provider.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.buy_item'),
            'icon' => 'fas fa-box fa-fw',
            'total' => BuyItem::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-item.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.buy_endorse'),
            'icon' => 'fas fa-comments-dollar fa-fw',
            'total' => BuyEndorse::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-endorse.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.buy_pln_token'),
            'icon' => 'fas fa-plug-circle-bolt fa-fw',
            'total' => BuyPlnToken::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.buy-pln-token.index"),
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
