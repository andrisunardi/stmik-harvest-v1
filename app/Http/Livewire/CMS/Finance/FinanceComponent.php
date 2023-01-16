<?php

namespace App\Http\Livewire\CMS\Finance;

use App\Http\Livewire\CMS\Component;
use App\Models\AdministrativeCost;
use App\Models\Bank;
use App\Models\BankBca;
use App\Models\BankInterest;
use App\Models\Charge;
use App\Models\Deposit;
use App\Models\DepositCategory;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\GoogleAdsense;
use App\Models\Loyalty;
use App\Models\Payment;
use App\Models\PaymentCategory;
use App\Models\Salary;
use App\Models\Withdraw;
use App\Models\WithdrawCategory;
use Illuminate\Support\Str;

class FinanceComponent extends Component
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
        $this->pageName = 'Finance';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-wallet';
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
            'name' => trans('index.payment'),
            'icon' => 'fas fa-credit-card fa-fw',
            'total' => Payment::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.payment.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.payment_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => PaymentCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.payment.category.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.charge'),
            'icon' => 'fas fa-money-check fa-fw',
            'total' => Charge::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.charge.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.google_adsense'),
            'icon' => 'fas fa-money-bill-wave fa-fw',
            'total' => GoogleAdsense::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.google-adsense.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.salary'),
            'icon' => 'fas fa-hand-holding-usd fa-fw',
            'total' => Salary::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.salary.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.loyalty'),
            'icon' => 'fas fa-money-bill fa-fw',
            'total' => Loyalty::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.loyalty.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.deposit'),
            'icon' => 'fas fa-arrow-alt-circle-down fa-fw',
            'total' => Deposit::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.deposit.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.deposit_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => DepositCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.deposit.category.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.withdraw'),
            'icon' => 'fas fa-arrow-alt-circle-up fa-fw',
            'total' => Withdraw::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.withdraw.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.withdraw_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => WithdrawCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.withdraw.category.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.donation'),
            'icon' => 'fas fa-donate fa-fw',
            'total' => Donation::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.donation.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.donation_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => DonationCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.donation.category.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.bank_interest'),
            'icon' => 'fas fa-piggy-bank fa-fw',
            'total' => BankInterest::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.bank-interest.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.administrative_cost'),
            'icon' => 'fas fa-money-bill-1 fa-fw',
            'total' => AdministrativeCost::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.administrative-cost.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.bank_bca'),
            'icon' => 'fas fa-building-flag fa-fw',
            'total' => BankBca::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.bank-bca.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.bank'),
            'icon' => 'fas fa-bank fa-fw',
            'total' => Bank::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.bank.index"),
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
