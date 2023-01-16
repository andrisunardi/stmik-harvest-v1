<?php

namespace App\Http\Livewire\CMS;

use App\Enums\PortfolioStatus;
use App\Models\Absent;
use App\Models\AdministrativeCost;
use App\Models\AdvertisementProvider;
use App\Models\Assignment;
use App\Models\Bank;
use App\Models\BankBca;
use App\Models\BankInterest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BuyAdvertisement;
use App\Models\BuyDomainHosting;
use App\Models\BuyEndorse;
use App\Models\BuyInternet;
use App\Models\BuyItem;
use App\Models\BuyPhoneCredit;
use App\Models\BuyPlnToken;
use App\Models\Career;
use App\Models\Charge;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Deposit;
use App\Models\DepositCategory;
use App\Models\Documentation;
use App\Models\DomainHostingProvider;
use App\Models\Donation;
use App\Models\DonationCategory;
use App\Models\Employee;
use App\Models\Faq;
use App\Models\Forum;
use App\Models\ForumCategory;
use App\Models\Framework;
use App\Models\Game;
use App\Models\GameCategory;
use App\Models\GoogleAdsense;
use App\Models\History;
use App\Models\InternetProvider;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Loyalty;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Newsletter;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentCategory;
use App\Models\PhoneCreditProvider;
use App\Models\Platform;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioDislike;
use App\Models\PortfolioLike;
use App\Models\PriceList;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Progress;
use App\Models\Promotion;
use App\Models\Quote;
use App\Models\RegisterInfluencer;
use App\Models\Revision;
use App\Models\Salary;
use App\Models\Service;
use App\Models\Sponsor;
use App\Models\Task;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\WithdrawCategory;
use Illuminate\Support\Str;

class HomeComponent extends Component
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
        $this->pageName = 'Home';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-home';
        $this->pageTable = null;
        $this->pageCategoryName = null;
        $this->pageCategoryTitle = null;
        $this->pageCategorySlug = null;
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $readyToLoad = false;

    public function loadData()
    {
        $this->readyToLoad = true;

        $this->alert('info', trans('index.data_have_been_loaded_successfully'));
    }

    public function mount()
    {
        // $employee = User::whereIn('access_id', ['1', '2', '3', '4', '5', '6'])->count();
        // $endorse = User::where('access_id', '13')->count();
        // $client = User::where('access_id', '7')->count();
        // $agent = User::where('access_id', '8')->count();
        // $user = User::count();

        // $total_payment_monthly_january = Payment::active()->whereBetween('datetime', [date('Y-01-01'), date('Y-01-t')])->sum('amount');
        // $total_charge_monthly_january = Charge::active()->whereBetween('datetime', [date('Y-01-01'), date('Y-01-t')])->sum('amount');
        // $total_bank_interest_monthly_january = BankInterest::active()->whereBetween('date', [date('Y-01-01'), date('Y-01-t')])->sum('amount');
        // $total_google_adsense_monthly_january = GoogleAdsense::active()->whereBetween('datetime', [date('Y-01-01'), date('Y-01-t')])->sum('amount');
        // $total_income_monthly_january = $total_payment_monthly_january + $total_charge_monthly_january + $total_bank_interest_monthly_january + $total_google_adsense_monthly_january;

        // $total_payment_monthly_february = Payment::active()->whereBetween('datetime', [date('Y-02-02'), date('Y-02-t')])->sum('amount');
        // $total_charge_monthly_february = Charge::active()->whereBetween('datetime', [date('Y-02-02'), date('Y-02-t')])->sum('amount');
        // $total_bank_interest_monthly_february = BankInterest::active()->whereBetween('date', [date('Y-02-02'), date('Y-02-t')])->sum('amount');
        // $total_google_adsense_monthly_february = GoogleAdsense::active()->whereBetween('datetime', [date('Y-02-02'), date('Y-02-t')])->sum('amount');
        // $total_income_monthly_february = $total_payment_monthly_february + $total_charge_monthly_february + $total_bank_interest_monthly_february + $total_google_adsense_monthly_february;

        // $total_payment_monthly_march = Payment::active()->whereBetween('datetime', [date('Y-03-03'), date('Y-03-t')])->sum('amount');
        // $total_charge_monthly_march = Charge::active()->whereBetween('datetime', [date('Y-03-03'), date('Y-03-t')])->sum('amount');
        // $total_bank_interest_monthly_march = BankInterest::active()->whereBetween('date', [date('Y-03-03'), date('Y-03-t')])->sum('amount');
        // $total_google_adsense_monthly_march = GoogleAdsense::active()->whereBetween('datetime', [date('Y-03-03'), date('Y-03-t')])->sum('amount');
        // $total_income_monthly_march = $total_payment_monthly_march + $total_charge_monthly_march + $total_bank_interest_monthly_march + $total_google_adsense_monthly_march;

        // $total_payment_monthly_april = Payment::active()->whereBetween('datetime', [date('Y-04-04'), date('Y-04-t')])->sum('amount');
        // $total_charge_monthly_april = Charge::active()->whereBetween('datetime', [date('Y-04-04'), date('Y-04-t')])->sum('amount');
        // $total_bank_interest_monthly_april = BankInterest::active()->whereBetween('date', [date('Y-04-04'), date('Y-04-t')])->sum('amount');
        // $total_google_adsense_monthly_april = GoogleAdsense::active()->whereBetween('datetime', [date('Y-04-04'), date('Y-04-t')])->sum('amount');
        // $total_income_monthly_april = $total_payment_monthly_april + $total_charge_monthly_april + $total_bank_interest_monthly_april + $total_google_adsense_monthly_april;

        // $total_payment_monthly_may = Payment::active()->whereBetween('datetime', [date('Y-05-05'), date('Y-05-t')])->sum('amount');
        // $total_charge_monthly_may = Charge::active()->whereBetween('datetime', [date('Y-05-05'), date('Y-05-t')])->sum('amount');
        // $total_bank_interest_monthly_may = BankInterest::active()->whereBetween('date', [date('Y-05-05'), date('Y-05-t')])->sum('amount');
        // $total_google_adsense_monthly_may = GoogleAdsense::active()->whereBetween('datetime', [date('Y-05-05'), date('Y-05-t')])->sum('amount');
        // $total_income_monthly_may = $total_payment_monthly_may + $total_charge_monthly_may + $total_bank_interest_monthly_may + $total_google_adsense_monthly_may;

        // $total_payment_monthly_june = Payment::active()->whereBetween('datetime', [date('Y-06-06'), date('Y-06-t')])->sum('amount');
        // $total_charge_monthly_june = Charge::active()->whereBetween('datetime', [date('Y-06-06'), date('Y-06-t')])->sum('amount');
        // $total_bank_interest_monthly_june = BankInterest::active()->whereBetween('date', [date('Y-06-06'), date('Y-06-t')])->sum('amount');
        // $total_google_adsense_monthly_june = GoogleAdsense::active()->whereBetween('datetime', [date('Y-06-06'), date('Y-06-t')])->sum('amount');
        // $total_income_monthly_june = $total_payment_monthly_june + $total_charge_monthly_june + $total_bank_interest_monthly_june + $total_google_adsense_monthly_june;

        // $total_payment_monthly_july = Payment::active()->whereBetween('datetime', [date('Y-07-07'), date('Y-07-t')])->sum('amount');
        // $total_charge_monthly_july = Charge::active()->whereBetween('datetime', [date('Y-07-07'), date('Y-07-t')])->sum('amount');
        // $total_bank_interest_monthly_july = BankInterest::active()->whereBetween('date', [date('Y-07-07'), date('Y-07-t')])->sum('amount');
        // $total_google_adsense_monthly_july = GoogleAdsense::active()->whereBetween('datetime', [date('Y-07-07'), date('Y-07-t')])->sum('amount');
        // $total_income_monthly_july = $total_payment_monthly_july + $total_charge_monthly_july + $total_bank_interest_monthly_july + $total_google_adsense_monthly_july;

        // $total_payment_monthly_august = Payment::active()->whereBetween('datetime', [date('Y-08-08'), date('Y-08-t')])->sum('amount');
        // $total_charge_monthly_august = Charge::active()->whereBetween('datetime', [date('Y-08-08'), date('Y-08-t')])->sum('amount');
        // $total_bank_interest_monthly_august = BankInterest::active()->whereBetween('date', [date('Y-08-08'), date('Y-08-t')])->sum('amount');
        // $total_google_adsense_monthly_august = GoogleAdsense::active()->whereBetween('datetime', [date('Y-08-08'), date('Y-08-t')])->sum('amount');
        // $total_income_monthly_august = $total_payment_monthly_august + $total_charge_monthly_august + $total_bank_interest_monthly_august + $total_google_adsense_monthly_august;

        // $total_payment_monthly_september = Payment::active()->whereBetween('datetime', [date('Y-09-09'), date('Y-09-t')])->sum('amount');
        // $total_charge_monthly_september = Charge::active()->whereBetween('datetime', [date('Y-09-09'), date('Y-09-t')])->sum('amount');
        // $total_bank_interest_monthly_september = BankInterest::active()->whereBetween('date', [date('Y-09-09'), date('Y-09-t')])->sum('amount');
        // $total_google_adsense_monthly_september = GoogleAdsense::active()->whereBetween('datetime', [date('Y-09-09'), date('Y-09-t')])->sum('amount');
        // $total_income_monthly_september = $total_payment_monthly_september + $total_charge_monthly_september + $total_bank_interest_monthly_september + $total_google_adsense_monthly_september;

        // $total_payment_monthly_october = Payment::active()->whereBetween('datetime', [date('Y-10-10'), date('Y-10-t')])->sum('amount');
        // $total_charge_monthly_october = Charge::active()->whereBetween('datetime', [date('Y-10-10'), date('Y-10-t')])->sum('amount');
        // $total_bank_interest_monthly_october = BankInterest::active()->whereBetween('date', [date('Y-10-10'), date('Y-10-t')])->sum('amount');
        // $total_google_adsense_monthly_october = GoogleAdsense::active()->whereBetween('datetime', [date('Y-10-10'), date('Y-10-t')])->sum('amount');
        // $total_income_monthly_october = $total_payment_monthly_october + $total_charge_monthly_october + $total_bank_interest_monthly_october + $total_google_adsense_monthly_october;

        // $total_payment_monthly_november = Payment::active()->whereBetween('datetime', [date('Y-11-11'), date('Y-11-t')])->sum('amount');
        // $total_charge_monthly_november = Charge::active()->whereBetween('datetime', [date('Y-11-11'), date('Y-11-t')])->sum('amount');
        // $total_bank_interest_monthly_november = BankInterest::active()->whereBetween('date', [date('Y-11-11'), date('Y-11-t')])->sum('amount');
        // $total_google_adsense_monthly_november = GoogleAdsense::active()->whereBetween('datetime', [date('Y-11-11'), date('Y-11-t')])->sum('amount');
        // $total_income_monthly_november = $total_payment_monthly_november + $total_charge_monthly_november + $total_bank_interest_monthly_november + $total_google_adsense_monthly_november;

        // $total_payment_monthly_december = Payment::active()->whereBetween('datetime', [date('Y-12-12'), date('Y-12-t')])->sum('amount');
        // $total_charge_monthly_december = Charge::active()->whereBetween('datetime', [date('Y-12-12'), date('Y-12-t')])->sum('amount');
        // $total_bank_interest_monthly_december = BankInterest::active()->whereBetween('date', [date('Y-12-12'), date('Y-12-t')])->sum('amount');
        // $total_google_adsense_monthly_december = GoogleAdsense::active()->whereBetween('datetime', [date('Y-12-12'), date('Y-12-t')])->sum('amount');
        // $total_income_monthly_december = $total_payment_monthly_december + $total_charge_monthly_december + $total_bank_interest_monthly_december + $total_google_adsense_monthly_december;

        // $total_payment_yearly_2015 = Payment::active()->whereBetween('datetime', [date('2015-01-01'), date('2015-12-t')])->sum('amount');
        // $total_charge_yearly_2015 = Charge::active()->whereBetween('datetime', [date('2015-01-01'), date('2015-12-t')])->sum('amount');
        // $total_bank_interest_yearly_2015 = BankInterest::active()->whereBetween('date', [date('2015-01-01'), date('2015-12-t')])->sum('amount');
        // $total_google_adsense_yearly_2015 = GoogleAdsense::active()->whereBetween('datetime', [date('2015-01-01'), date('2015-12-t')])->sum('amount');
        // $total_income_yearly_2015 = $total_payment_yearly_2015 + $total_charge_yearly_2015 + $total_bank_interest_yearly_2015 + $total_google_adsense_yearly_2015;

        // $total_payment_yearly_2016 = Payment::active()->whereBetween('datetime', [date('2016-01-01'), date('2016-12-t')])->sum('amount');
        // $total_charge_yearly_2016 = Charge::active()->whereBetween('datetime', [date('2016-01-01'), date('2016-12-t')])->sum('amount');
        // $total_bank_interest_yearly_2016 = BankInterest::active()->whereBetween('date', [date('2016-01-01'), date('2016-12-t')])->sum('amount');
        // $total_google_adsense_yearly_2016 = GoogleAdsense::active()->whereBetween('datetime', [date('2016-01-01'), date('2016-12-t')])->sum('amount');
        // $total_income_yearly_2016 = $total_payment_yearly_2016 + $total_charge_yearly_2016 + $total_bank_interest_yearly_2016 + $total_google_adsense_yearly_2016;

        // $total_payment_yearly_2017 = Payment::active()->whereBetween('datetime', [date('2017-01-01'), date('2017-12-t')])->sum('amount');
        // $total_charge_yearly_2017 = Charge::active()->whereBetween('datetime', [date('2017-01-01'), date('2017-12-t')])->sum('amount');
        // $total_bank_interest_yearly_2017 = BankInterest::active()->whereBetween('date', [date('2017-01-01'), date('2017-12-t')])->sum('amount');
        // $total_google_adsense_yearly_2017 = GoogleAdsense::active()->whereBetween('datetime', [date('2017-01-01'), date('2017-12-t')])->sum('amount');
        // $total_income_yearly_2017 = $total_payment_yearly_2017 + $total_charge_yearly_2017 + $total_bank_interest_yearly_2017 + $total_google_adsense_yearly_2017;

        // $total_payment_yearly_2018 = Payment::active()->whereBetween('datetime', [date('2018-01-01'), date('2018-12-t')])->sum('amount');
        // $total_charge_yearly_2018 = Charge::active()->whereBetween('datetime', [date('2018-01-01'), date('2018-12-t')])->sum('amount');
        // $total_bank_interest_yearly_2018 = BankInterest::active()->whereBetween('date', [date('2018-01-01'), date('2018-12-t')])->sum('amount');
        // $total_google_adsense_yearly_2018 = GoogleAdsense::active()->whereBetween('datetime', [date('2018-01-01'), date('2018-12-t')])->sum('amount');
        // $total_income_yearly_2018 = $total_payment_yearly_2018 + $total_charge_yearly_2018 + $total_bank_interest_yearly_2018 + $total_google_adsense_yearly_2018;

        // $total_payment_yearly_2019 = Payment::active()->whereBetween('datetime', [date('2019-01-01'), date('2019-12-t')])->sum('amount');
        // $total_charge_yearly_2019 = Charge::active()->whereBetween('datetime', [date('2019-01-01'), date('2019-12-t')])->sum('amount');
        // $total_bank_interest_yearly_2019 = BankInterest::active()->whereBetween('date', [date('2019-01-01'), date('2019-12-t')])->sum('amount');
        // $total_google_adsense_yearly_2019 = GoogleAdsense::active()->whereBetween('datetime', [date('2019-01-01'), date('2019-12-t')])->sum('amount');
        // $total_income_yearly_2019 = $total_payment_yearly_2019 + $total_charge_yearly_2019 + $total_bank_interest_yearly_2019 + $total_google_adsense_yearly_2019;

        // $total_payment_yearly_2020 = Payment::active()->whereBetween('datetime', [date('2020-01-01'), date('2020-12-t')])->sum('amount');
        // $total_charge_yearly_2020 = Charge::active()->whereBetween('datetime', [date('2020-01-01'), date('2020-12-t')])->sum('amount');
        // $total_bank_interest_yearly_2020 = BankInterest::active()->whereBetween('date', [date('2020-01-01'), date('2020-12-t')])->sum('amount');
        // $total_google_adsense_yearly_2020 = GoogleAdsense::active()->whereBetween('datetime', [date('2020-01-01'), date('2020-12-t')])->sum('amount');
        // $total_income_yearly_2020 = $total_payment_yearly_2020 + $total_charge_yearly_2020 + $total_bank_interest_yearly_2020 + $total_google_adsense_yearly_2020;

        // $total_portfolio_monthly_january = Portfolio::active()->whereBetween('datetime', [date('Y-01-01'), date('Y-01-t')])->count();
        // $total_portfolio_monthly_february = Portfolio::active()->whereBetween('datetime', [date('Y-02-01'), date('Y-02-t')])->count();
        // $total_portfolio_monthly_march = Portfolio::active()->whereBetween('datetime', [date('Y-03-01'), date('Y-03-t')])->count();
        // $total_portfolio_monthly_april = Portfolio::active()->whereBetween('datetime', [date('Y-04-01'), date('Y-04-t')])->count();
        // $total_portfolio_monthly_may = Portfolio::active()->whereBetween('datetime', [date('Y-05-01'), date('Y-05-t')])->count();
        // $total_portfolio_monthly_june = Portfolio::active()->whereBetween('datetime', [date('Y-06-01'), date('Y-06-t')])->count();
        // $total_portfolio_monthly_july = Portfolio::active()->whereBetween('datetime', [date('Y-07-01'), date('Y-07-t')])->count();
        // $total_portfolio_monthly_august = Portfolio::active()->whereBetween('datetime', [date('Y-08-01'), date('Y-08-t')])->count();
        // $total_portfolio_monthly_september = Portfolio::active()->whereBetween('datetime', [date('Y-09-01'), date('Y-09-t')])->count();
        // $total_portfolio_monthly_october = Portfolio::active()->whereBetween('datetime', [date('Y-10-01'), date('Y-10-t')])->count();
        // $total_portfolio_monthly_november = Portfolio::active()->whereBetween('datetime', [date('Y-11-01'), date('Y-11-t')])->count();
        // $total_portfolio_monthly_december = Portfolio::active()->whereBetween('datetime', [date('Y-12-01'), date('Y-12-t')])->count();

        // $total_portfolio_yearly_2015 = Portfolio::active()->whereBetween('datetime', [date('2015-01-01'), date('2015-12-t')])->count();
        // $total_portfolio_yearly_2016 = Portfolio::active()->whereBetween('datetime', [date('2016-01-01'), date('2016-12-t')])->count();
        // $total_portfolio_yearly_2017 = Portfolio::active()->whereBetween('datetime', [date('2017-01-01'), date('2017-12-t')])->count();
        // $total_portfolio_yearly_2018 = Portfolio::active()->whereBetween('datetime', [date('2018-01-01'), date('2018-12-t')])->count();
        // $total_portfolio_yearly_2019 = Portfolio::active()->whereBetween('datetime', [date('2019-01-01'), date('2019-12-t')])->count();
        // $total_portfolio_yearly_2020 = Portfolio::active()->whereBetween('datetime', [date('2020-01-01'), date('2020-12-t')])->count();
    }

    public function getSummary()
    {
        $sumPricePortfolio = Portfolio::active()->sum('price');

        $sumAmountPayment = Payment::active()->sum('amount');
        $sumAmountCharge = Charge::active()->sum('amount');
        $sumAmountBankInterest = BankInterest::active()->sum('amount');
        $sumAmountGoogleAdsense = GoogleAdsense::active()->sum('amount');

        $sumAmountSalary = Salary::active()->sum('amount');
        $sumAmountLoyalty = Loyalty::active()->sum('amount');
        $sumAmountBuyAdvertisement = BuyAdvertisement::active()->sum('amount');
        $sumAmountBuyDomainHosting = BuyDomainHosting::active()->sum('amount');
        $sumAmountBuyEndorse = BuyEndorse::active()->sum('amount');
        $sumAmountBuyItem = BuyItem::active()->sum('amount');
        $sumAmountBuyInternet = BuyInternet::active()->sum('amount');
        $sumAmountBuyPhoneCredit = BuyPhoneCredit::active()->sum('amount');
        $sumAmountBuyPlnToken = BuyPlnToken::active()->sum('amount');
        $sumAmountAdministrativeCost = AdministrativeCost::active()->sum('amount');

        $totalIncome = $sumAmountPayment + $sumAmountCharge + $sumAmountBankInterest + $sumAmountGoogleAdsense;
        $totalSpending = $sumAmountSalary + $sumAmountLoyalty + $sumAmountBuyAdvertisement + $sumAmountBuyDomainHosting + $sumAmountBuyEndorse + $sumAmountBuyItem + $sumAmountBuyInternet + $sumAmountBuyPhoneCredit + $sumAmountBuyPlnToken + $sumAmountAdministrativeCost;
        $balance = $totalIncome - $totalSpending;
        $averageIncomeMonthly = $balance / now()->format('n');

        return collect([
            'sumPricePortfolio' => $sumPricePortfolio,

            'sumAmountPayment' => $sumAmountPayment,
            'sumAmountCharge' => $sumAmountCharge,
            'sumAmountBankInterest' => $sumAmountBankInterest,
            'sumAmountGoogleAdsense' => $sumAmountGoogleAdsense,

            'sumAmountSalary' => $sumAmountSalary,
            'sumAmountLoyalty' => $sumAmountLoyalty,
            'sumAmountBuyAdvertisement' => $sumAmountBuyAdvertisement,
            'sumAmountBuyDomainHosting' => $sumAmountBuyDomainHosting,
            'sumAmountBuyEndorse' => $sumAmountBuyEndorse,
            'sumAmountBuyItem' => $sumAmountBuyItem,
            'sumAmountBuyInternet' => $sumAmountBuyInternet,
            'sumAmountBuyPhoneCredit' => $sumAmountBuyPhoneCredit,
            'sumAmountBuyPlnToken' => $sumAmountBuyPlnToken,
            'sumAmountAdministrativeCost' => $sumAmountAdministrativeCost,

            'totalIncome' => $totalIncome,
            'totalSpending' => $totalSpending,
            'balance' => $balance,
            'averageIncomeMonthly' => $averageIncomeMonthly,
        ]);
    }

    public function getPortfolioOneMonthExpireds()
    {
        return Portfolio::with('user', 'lastPayment')->whereIn('status', ['0', '1'])
            ->whereNotNull('expired')
            ->whereBetween('expired', [now()->format('Y-m-d'), now()->addMonth()->format('Y-m-d')])
            ->active()
            ->latest('id')
            ->get();
    }

    public function getPortfolioExpireds()
    {
        return Portfolio::with('user', 'lastPayment')->whereIn('status', ['0', '1'])
            ->whereNotNull('link')
            ->whereNotNull('expired')
            ->whereDate('expired', '<=', now()->format('Y-m-d'))
            ->active()
            ->latest('id')
            ->get();
    }

    public function getPortfolioOnProgresses()
    {
        return Portfolio::with('user')
            ->where('status', PortfolioStatus::OnProgress)
            ->active()
            ->latest('id')
            ->get();
    }

    public function getPortfolioNotBalanceds()
    {
        return Portfolio::with('user', 'charges', 'payments')
            ->active()
            ->latest('id')
            ->get();
    }

    public function getBgClass()
    {
        return collect(['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-secondary']);
    }

    public function getNavigations()
    {
        return collect([[
            'name' => trans('index.dashboard'),
            'slug' => 'dashboard',
            'icon' => 'fas fa-dashboard fa-fw',
        ], [
            'name' => trans('index.development'),
            'slug' => 'development',
            'icon' => 'fas fa-tools fa-fw',
        ], [
            'name' => trans('index.hrd'),
            'slug' => 'hrd',
            'icon' => 'fas fa-user-tie fa-fw',
        ], [
            'name' => trans('index.purchasing'),
            'slug' => 'purchasing',
            'icon' => 'fas fa-cash-register fa-fw',
        ], [
            'name' => trans('index.marketing'),
            'slug' => 'marketing',
            'icon' => 'fas fa-bullhorn fa-fw',
        ], [
            'name' => trans('index.finance'),
            'slug' => 'finance',
            'icon' => 'fas fa-wallet fa-fw',
        ], [
            'name' => trans('index.other'),
            'slug' => 'other',
            'icon' => 'fas fa-database fa-fw',
        ], [
            'name' => trans('index.total_data'),
            'slug' => 'total-data',
            'icon' => 'fas fa-table fa-fw',
        ]]);
    }

    public function getDevelopments()
    {
        $pageCategorySlug = 'development';

        return collect([[
            'name' => trans('index.portfolio'),
            'icon' => 'fas fa-th-large fa-fw',
            'total' => Portfolio::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.portfolio.index"),
        ], [
            'name' => trans('index.portfolio_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => PortfolioCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.portfolio.category.index"),
        ], [
            'name' => trans('index.portfolio_like'),
            'icon' => 'fas fa-thumbs-up fa-fw',
            'total' => PortfolioLike::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.portfolio.like.index"),
        ], [
            'name' => trans('index.portfolio_dislike'),
            'icon' => 'fas fa-thumbs-down fa-fw',
            'total' => PortfolioDislike::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.portfolio.dislike.index"),
        ], [
            'name' => trans('index.product'),
            'icon' => 'fas fa-boxes fa-fw',
            'total' => Product::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.product.index"),
        ], [
            'name' => trans('index.product_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => ProductCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.product.category.index"),
        ], [
            'name' => trans('index.template'),
            'icon' => 'fas fa-cubes fa-fw',
            'total' => Template::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.template.index"),
        ], [
            'name' => trans('index.template_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => TemplateCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.template.category.index"),
        ], [
            'name' => trans('index.task'),
            'icon' => 'fas fa-tasks fa-fw',
            'total' => Task::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.task.index"),
        ], [
            'name' => trans('index.assignment'),
            'icon' => 'fas fa-square-check fa-fw',
            'total' => Assignment::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.assignment.index"),
        ], [
            'name' => trans('index.progress'),
            'icon' => 'fas fa-bars-progress fa-fw',
            'total' => Progress::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.progress.index"),
        ], [
            'name' => trans('index.revision'),
            'icon' => 'fas fa-file-circle-check fa-fw',
            'total' => Revision::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.revision.index"),
        ], [
            'name' => trans('index.framework'),
            'icon' => 'fas fa-screwdriver-wrench fa-fw',
            'total' => Framework::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.framework.index"),
        ]]);
    }

    public function getHrds()
    {
        $pageCategorySlug = 'hrd';

        return collect([[
            'name' => trans('index.absent'),
            'icon' => 'fas fa-check-to-slot fa-fw',
            'total' => Absent::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.absent.index"),
        ], [
            'name' => trans('index.employee'),
            'icon' => 'fas fa-users fa-fw',
            'total' => Employee::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.employee.index"),
        ], [
            'name' => trans('index.endorse'),
            'icon' => 'fas fa-people-group fa-fw',
            'total' => BuyEndorse::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.endorse.index"),
        ], [
            'name' => trans('index.client'),
            'icon' => 'fas fa-user-tie fa-fw',
            'total' => Client::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.client.index"),
        ], [
            'name' => trans('index.agent'),
            'icon' => 'fas fa-user-secret fa-fw',
            'total' => User::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.agent.index"),
        ], [
            'name' => trans('index.career'),
            'icon' => 'fas fa-briefcase fa-fw',
            'total' => Career::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.career.index"),
        ], [
            'name' => trans('index.register_influencer'),
            'icon' => 'fas fa-pen fa-fw',
            'total' => RegisterInfluencer::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.register-influencer.index"),
        ], [
            'name' => trans('index.sponsor'),
            'icon' => 'fas fa-people-line fa-fw',
            'total' => Sponsor::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.sponsor.index"),
        ], [
            'name' => trans('index.testimonial'),
            'icon' => 'fas fa-comments fa-fw',
            'total' => Testimonial::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.testimonial.index"),
        ], [
            'name' => trans('index.procedure'),
            'icon' => 'fas fa-rectangle-list fa-fw',
            'total' => Template::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.procedure.index"),
        ], [
            'name' => trans('index.procedure_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => TemplateCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.procedure.category.index"),
        ], [
            'name' => trans('index.rule'),
            'icon' => 'fas fa-gavel fa-fw',
            'total' => Task::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.rule.index"),
        ], [
            'name' => trans('index.rule_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => Assignment::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.rule.category.index"),
        ]]);
    }

    public function getPurchasings()
    {
        $pageCategorySlug = 'purchasing';

        return collect([[
            'name' => trans('index.buy_advertisement'),
            'icon' => 'fas fa-bullhorn fa-fw',
            'total' => BuyAdvertisement::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-advertisement.index"),
        ], [
            'name' => trans('index.advertisement_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => AdvertisementProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.advertisement-provider.index"),
        ], [
            'name' => trans('index.buy_domain_hosting'),
            'icon' => 'fas fa-server fa-fw',
            'total' => BuyDomainHosting::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-domain-hosting.index"),
        ], [
            'name' => trans('index.domain_hosting_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => DomainHostingProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.domain-hosting-provider.index"),
        ], [
            'name' => trans('index.buy_internet'),
            'icon' => 'fas fa-wifi fa-fw',
            'total' => BuyInternet::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-internet.index"),
        ], [
            'name' => trans('index.internet_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => InternetProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.internet-provider.index"),
        ], [
            'name' => trans('index.buy_phone_credit'),
            'icon' => 'fas fa-coins fa-fw',
            'total' => BuyPhoneCredit::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-phone-credit.index"),
        ], [
            'name' => trans('index.phone_credit_provider'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => PhoneCreditProvider::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.phone-credit-provider.index"),
        ], [
            'name' => trans('index.buy_item'),
            'icon' => 'fas fa-box fa-fw',
            'total' => BuyItem::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-item.index"),
        ], [
            'name' => trans('index.buy_endorse'),
            'icon' => 'fas fa-comments-dollar fa-fw',
            'total' => BuyEndorse::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-endorse.index"),
        ], [
            'name' => trans('index.buy_pln_token'),
            'icon' => 'fas fa-plug-circle-bolt fa-fw',
            'total' => BuyPlnToken::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.buy-pln-token.index"),
        ]]);
    }

    public function getFinances()
    {
        $pageCategorySlug = 'finance';

        return collect([[
            'name' => trans('index.payment'),
            'icon' => 'fas fa-credit-card fa-fw',
            'total' => Payment::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.payment.index"),
        ], [
            'name' => trans('index.payment_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => PaymentCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.payment.category.index"),
        ], [
            'name' => trans('index.charge'),
            'icon' => 'fas fa-money-check fa-fw',
            'total' => Charge::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.charge.index"),
        ], [
            'name' => trans('index.google_adsense'),
            'icon' => 'fas fa-money-bill-wave fa-fw',
            'total' => GoogleAdsense::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.google-adsense.index"),
        ], [
            'name' => trans('index.salary'),
            'icon' => 'fas fa-hand-holding-usd fa-fw',
            'total' => Salary::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.salary.index"),
        ], [
            'name' => trans('index.loyalty'),
            'icon' => 'fas fa-money-bill fa-fw',
            'total' => Loyalty::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.loyalty.index"),
        ], [
            'name' => trans('index.deposit'),
            'icon' => 'fas fa-arrow-alt-circle-down fa-fw',
            'total' => Deposit::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.deposit.index"),
        ], [
            'name' => trans('index.deposit_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => DepositCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.deposit.category.index"),
        ], [
            'name' => trans('index.withdraw'),
            'icon' => 'fas fa-arrow-alt-circle-up fa-fw',
            'total' => Withdraw::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.withdraw.index"),
        ], [
            'name' => trans('index.withdraw_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => WithdrawCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.withdraw.category.index"),
        ], [
            'name' => trans('index.donation'),
            'icon' => 'fas fa-donate fa-fw',
            'total' => Donation::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.donation.index"),
        ], [
            'name' => trans('index.donation_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => DonationCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.donation.category.index"),
        ], [
            'name' => trans('index.bank_interest'),
            'icon' => 'fas fa-piggy-bank fa-fw',
            'total' => BankInterest::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.bank-interest.index"),
        ], [
            'name' => trans('index.administrative_cost'),
            'icon' => 'fas fa-money-bill-1 fa-fw',
            'total' => AdministrativeCost::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.administrative-cost.index"),
        ], [
            'name' => trans('index.bank_bca'),
            'icon' => 'fas fa-bank fa-fw',
            'total' => BankBca::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.bank-bca.index"),
        ], [
            'name' => trans('index.bank'),
            'icon' => 'fas fa-bank fa-fw',
            'total' => Bank::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.bank.index"),
        ]]);
    }

    public function getMarketings()
    {
        $pageCategorySlug = 'marketing';

        return collect([[
            'name' => trans('index.news'),
            'icon' => 'fas fa-newspaper fa-fw',
            'total' => News::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.news.index"),
        ], [
            'name' => trans('index.news_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => NewsCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.news.category.index"),
        ], [
            'name' => trans('index.blog'),
            'icon' => 'fas fa-note-sticky fa-fw',
            'total' => Blog::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.blog.index"),
        ], [
            'name' => trans('index.blog_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => BlogCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.blog.category.index"),
        ], [
            'name' => trans('index.game'),
            'icon' => 'fas fa-gamepad fa-fw',
            'total' => Game::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.game.index"),
        ], [
            'name' => trans('index.game_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => GameCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.game.category.index"),
        ], [
            'name' => trans('index.job'),
            'icon' => 'fas fa-suitcase fa-fw',
            'total' => Job::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.job.index"),
        ], [
            'name' => trans('index.job_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => JobCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.job.category.index"),
        ], [
            'name' => trans('index.forum'),
            'icon' => 'fas fa-comment-dots fa-fw',
            'total' => Forum::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.forum.index"),
        ], [
            'name' => trans('index.forum_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => ForumCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.forum.category.index"),
        ], [
            'name' => trans('index.order'),
            'icon' => 'fas fa-cart-shopping fa-fw',
            'total' => Order::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.order.index"),
        ], [
            'name' => trans('index.contact'),
            'icon' => 'fas fa-phone fa-fw',
            'total' => Contact::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.contact.index"),
        ], [
            'name' => trans('index.promotion'),
            'icon' => 'fas fa-gift fa-fw',
            'total' => Promotion::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.promotion.index"),
        ], [
            'name' => trans('index.price_list'),
            'icon' => 'fas fa-list-ol fa-fw',
            'total' => PriceList::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.price-list.index"),
        ], [
            'name' => trans('index.newsletter'),
            'icon' => 'fas fa-envelopes-bulk fa-fw',
            'total' => Newsletter::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.newsletter.index"),
        ], [
            'name' => trans('index.platform'),
            'icon' => 'fas fa-circle-check fa-fw',
            'total' => Platform::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.platform.index"),
        ], [
            'name' => trans('index.service'),
            'icon' => 'fas fa-wrench fa-fw',
            'total' => Service::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.service.index"),
        ]]);
    }

    public function getOthers()
    {
        $pageCategorySlug = 'other';

        return collect([[
            'name' => trans('index.history'),
            'icon' => 'fas fa-scroll fa-fw',
            'total' => History::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.history.index"),
        ], [
            'name' => trans('index.documentation'),
            'icon' => 'fas fa-photo-film fa-fw',
            'total' => Documentation::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.documentation.index"),
        ], [
            'name' => trans('index.quote'),
            'icon' => 'fas fa-quote-left fa-fw',
            'total' => Quote::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.quote.index"),
        ], [
            'name' => trans('index.notification'),
            'icon' => 'fas fa-bell fa-fw',
            'total' => Notification::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.notification.index"),
        ], [
            'name' => trans('index.faq'),
            'icon' => 'fas fa-question-circle fa-fw',
            'total' => Faq::cursor()->count(),
            'url' => route("{$this->subDomain}.{$pageCategorySlug}.faq.index"),
        ]]);
    }

    public function getPages()
    {
        return collect()
            ->merge($this->getDevelopments())
            ->merge($this->getHrds())
            ->merge($this->getPurchasings())
            ->merge($this->getFinances())
            ->merge($this->getMarketings())
            ->merge($this->getOthers());
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageSlug}.index", [
            'bgClass' => $this->getBgClass(),
            'navigations' => $this->getNavigations(),
            'summary' => $this->readyToLoad ? $this->getSummary() : collect(),
            'pages' => $this->readyToLoad ? $this->getPages() : collect(),
            'developments' => $this->readyToLoad ? $this->getDevelopments() : collect(),
            'hrds' => $this->readyToLoad ? $this->getHrds() : collect(),
            'purchasings' => $this->readyToLoad ? $this->getPurchasings() : collect(),
            'finances' => $this->readyToLoad ? $this->getFinances() : collect(),
            'marketings' => $this->readyToLoad ? $this->getMarketings() : collect(),
            'others' => $this->readyToLoad ? $this->getOthers() : collect(),
            'portfolioOneMonthExpireds' => $this->readyToLoad ? $this->getPortfolioOneMonthExpireds() : collect(),
            'portfolioExpireds' => $this->readyToLoad ? $this->getPortfolioExpireds() : collect(),
            'portfolioOnProgresses' => $this->readyToLoad ? $this->getPortfolioOnProgresses() : collect(),
            'portfolioNotBalanceds' => $this->readyToLoad ? $this->getPortfolioNotBalanceds() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
