<?php

namespace App\Providers;

use App\Models\Absent;
use App\Models\AdministrativeCost;
use App\Models\Advertisement;
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
use App\Models\Cart;
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
use App\Models\Endorse;
use App\Models\Faq;
use App\Models\Forum;
use App\Models\ForumCategory;
use App\Models\Framework;
use App\Models\Game;
use App\Models\GameCategory;
use App\Models\GoogleAdsense;
use App\Models\History;
use App\Models\InternetProvider;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
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
use App\Models\PortfolioImage;
use App\Models\PortfolioLike;
use App\Models\PriceList;
use App\Models\Procedure;
use App\Models\ProcedureCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Progress;
use App\Models\Promotion;
use App\Models\ProposalDocument;
use App\Models\Quote;
use App\Models\Refund;
use App\Models\RegisterInfluencer;
use App\Models\Revision;
use App\Models\Rule;
use App\Models\RuleCategory;
use App\Models\Salary;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Sponsor;
use App\Models\Task;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\WithdrawCategory;
use App\Observers\AbsentObserver;
use App\Observers\AdministrativeCostObserver;
use App\Observers\AdvertisementObserver;
use App\Observers\AdvertisementProviderObserver;
use App\Observers\AssignmentObserver;
use App\Observers\BankBcaObserver;
use App\Observers\BankInterestObserver;
use App\Observers\BankObserver;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogObserver;
use App\Observers\BuyAdvertisementObserver;
use App\Observers\BuyDomainHostingObserver;
use App\Observers\BuyEndorseObserver;
use App\Observers\BuyInternetObserver;
use App\Observers\BuyItemObserver;
use App\Observers\BuyPhoneCreditObserver;
use App\Observers\BuyPlnTokenObserver;
use App\Observers\CareerObserver;
use App\Observers\CartObserver;
use App\Observers\ChargeObserver;
use App\Observers\ClientObserver;
use App\Observers\ContactObserver;
use App\Observers\DepositCategoryObserver;
use App\Observers\DepositObserver;
use App\Observers\DocumentationObserver;
use App\Observers\DomainHostingProviderObserver;
use App\Observers\DonationCategoryObserver;
use App\Observers\DonationObserver;
use App\Observers\EmployeeObserver;
use App\Observers\EndorseObserver;
use App\Observers\FaqObserver;
use App\Observers\ForumCategoryObserver;
use App\Observers\ForumObserver;
use App\Observers\FrameworkObserver;
use App\Observers\GameCategoryObserver;
use App\Observers\GameObserver;
use App\Observers\GoogleAdsenseObserver;
use App\Observers\HistoryObserver;
use App\Observers\InternetProviderObserver;
use App\Observers\InvoiceDetailObserver;
use App\Observers\InvoiceObserver;
use App\Observers\JobCategoryObserver;
use App\Observers\JobObserver;
use App\Observers\LoyaltyObserver;
use App\Observers\NewsCategoryObserver;
use App\Observers\NewsletterObserver;
use App\Observers\NewsObserver;
use App\Observers\NotificationObserver;
use App\Observers\OrderObserver;
use App\Observers\PaymentCategoryObserver;
use App\Observers\PaymentObserver;
use App\Observers\PhoneCreditProviderObserver;
use App\Observers\PlatformObserver;
use App\Observers\PortfolioCategoryObserver;
use App\Observers\PortfolioDislikeObserver;
use App\Observers\PortfolioImageObserver;
use App\Observers\PortfolioLikeObserver;
use App\Observers\PortfolioObserver;
use App\Observers\PriceListObserver;
use App\Observers\ProcedureCategoryObserver;
use App\Observers\ProcedureObserver;
use App\Observers\ProductCategoryObserver;
use App\Observers\ProductObserver;
use App\Observers\ProgressObserver;
use App\Observers\PromotionObserver;
use App\Observers\ProposalDocumentObserver;
use App\Observers\QuoteObserver;
use App\Observers\RefundObserver;
use App\Observers\RegisterInfluencerObserver;
use App\Observers\RevisionObserver;
use App\Observers\RuleCategoryObserver;
use App\Observers\RuleObserver;
use App\Observers\SalaryObserver;
use App\Observers\ServiceObserver;
use App\Observers\SettingObserver;
use App\Observers\SponsorObserver;
use App\Observers\TaskObserver;
use App\Observers\TemplateCategoryObserver;
use App\Observers\TemplateObserver;
use App\Observers\TestimonialObserver;
use App\Observers\UserObserver;
use App\Observers\WithdrawCategoryObserver;
use App\Observers\WithdrawObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Str::macro('phone', function ($value) {
            $value = Str::slug($value, '');

            if (Str::substr($value, 0, 3) == '021') {
                return Str::substrReplace($value, '62', 0, 1);
            }
            if (Str::substr($value, 0, 5) == '(021)') {
                return Str::substrReplace($value, '62', 0, 2);
            }
            if (Str::substr($value, 0, 1) == '0') {
                return Str::substrReplace($value, '62', 0, 1);
            }

            return $value;
        });

        Str::macro('oddEven', function ($value) {
            return $value % 2 == 0 ? 'Even' : 'Odd';
        });

        Str::macro('percentage', function ($value) {
            return round($value, 2);
        });

        Str::macro('thousand', function ($value) {
            return number_format($value, 0, ',', '.');
        });

        Str::macro('rupiah', function ($value) {
            return 'Rp. '.number_format($value, 0, ',', '.');
        });

        Str::macro('idr', function ($value) {
            return 'IDR. '.number_format($value, 0, ',', '.');
        });

        Str::macro('dollar', function ($value) {
            return '$ '.number_format($value, 0, ',', '.');
        });

        Str::macro('yesno', function ($value) {
            return $value ? 'Yes' : 'No';
        });

        Str::macro('active', function ($value) {
            return $value ? 'Active' : 'Non Active';
        });

        Str::macro('successdanger', function ($value) {
            return $value == 1 ? 'success' : 'danger';
        });

        Str::macro('formatsymbol', function ($value, $symbol) {
            return Str::replace(['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '{', '[', '}', ']', '|', '\\', ':', ';', '"', "'", '<', ',', '>', '.', '?', '/', ' '], $symbol, $value);
        });

        Str::macro('color', function ($value) {
            if ($value % 1 == 0) {
                $color = 'primary';
            }
            if ($value % 2 == 0) {
                $color = 'secondary';
            }
            if ($value % 3 == 0) {
                $color = 'info';
            }
            if ($value % 4 == 0) {
                $color = 'success';
            }
            if ($value % 5 == 0) {
                $color = 'warning';
            }
            if ($value % 6 == 0) {
                $color = 'danger';
            }

            return $color;
        });

        Str::macro('logcolor', function ($value) {
            if ($value == 1) {
                $color = 'primary';
            }
            if ($value == 2) {
                $color = 'success';
            }
            if ($value == 3) {
                $color = 'warning';
            }
            if ($value == 4) {
                $color = 'info';
            }
            if ($value == 5) {
                $color = 'danger';
            }

            return $color;
        });

        Str::macro('formatBytes', function ($value, $precision = 2) {
            static $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $step = 1024;
            $i = 0;
            while (($value / $step) > 0.9) {
                $value = $value / $step;
                $i++;
            }

            return round($value, $precision).$units[$i];
        });

        Str::macro('translate', function ($value) {
            return trans('index.'.Str::slug(Str::headline($value), '_'));
        });

        Str::macro('setting', function ($value) {
            return Setting::where('key', $value)->first()->value ?? null;
        });

        Str::macro('code', function ($prefix, $table, $date, $digit) {
            $data = DB::table($table)->latest('id')->first();
            $code = Str::afterLast($data?->code, $prefix);

            if ($date) {
                $date = Carbon::parse($date)->format('ymd');
                $code = DB::table($table)->where('code', 'like', "%{$date}%")->latest('id')->first();
                if ($code) {
                    $code = Str::afterLast($code->code, $date);
                }
            }

            $increment = (int) $code + 1;
            $digit = sprintf("%0{$digit}d", $increment);

            return $prefix.$date.$digit;
        });
    }

    public function boot()
    {
        Model::preventLazyLoading();

        Schema::defaultStringLength(191);

        Absent::observe(AbsentObserver::class);
        AdministrativeCost::observe(AdministrativeCostObserver::class);
        Advertisement::observe(AdvertisementObserver::class);
        AdvertisementProvider::observe(AdvertisementProviderObserver::class);
        Assignment::observe(AssignmentObserver::class);
        Bank::observe(BankObserver::class);
        BankBca::observe(BankBcaObserver::class);
        BankInterest::observe(BankInterestObserver::class);
        Blog::observe(BlogObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
        BuyAdvertisement::observe(BuyAdvertisementObserver::class);
        BuyDomainHosting::observe(BuyDomainHostingObserver::class);
        BuyEndorse::observe(BuyEndorseObserver::class);
        BuyInternet::observe(BuyInternetObserver::class);
        BuyItem::observe(BuyItemObserver::class);
        BuyPhoneCredit::observe(BuyPhoneCreditObserver::class);
        BuyPlnToken::observe(BuyPlnTokenObserver::class);
        Career::observe(CareerObserver::class);
        Cart::observe(CartObserver::class);
        Charge::observe(ChargeObserver::class);
        Client::observe(ClientObserver::class);
        Contact::observe(ContactObserver::class);
        Deposit::observe(DepositObserver::class);
        DepositCategory::observe(DepositCategoryObserver::class);
        Documentation::observe(DocumentationObserver::class);
        DomainHostingProvider::observe(DomainHostingProviderObserver::class);
        Donation::observe(DonationObserver::class);
        DonationCategory::observe(DonationCategoryObserver::class);
        Employee::observe(EmployeeObserver::class);
        Endorse::observe(EndorseObserver::class);
        Faq::observe(FaqObserver::class);
        Forum::observe(ForumObserver::class);
        ForumCategory::observe(ForumCategoryObserver::class);
        Framework::observe(FrameworkObserver::class);
        Game::observe(GameObserver::class);
        GameCategory::observe(GameCategoryObserver::class);
        GoogleAdsense::observe(GoogleAdsenseObserver::class);
        History::observe(HistoryObserver::class);
        InternetProvider::observe(InternetProviderObserver::class);
        Invoice::observe(InvoiceObserver::class);
        InvoiceDetail::observe(InvoiceDetailObserver::class);
        Job::observe(JobObserver::class);
        JobCategory::observe(JobCategoryObserver::class);
        Loyalty::observe(LoyaltyObserver::class);
        News::observe(NewsObserver::class);
        NewsCategory::observe(NewsCategoryObserver::class);
        Newsletter::observe(NewsletterObserver::class);
        Notification::observe(NotificationObserver::class);
        Order::observe(OrderObserver::class);
        Payment::observe(PaymentObserver::class);
        PaymentCategory::observe(PaymentCategoryObserver::class);
        PhoneCreditProvider::observe(PhoneCreditProviderObserver::class);
        Platform::observe(PlatformObserver::class);
        Portfolio::observe(PortfolioObserver::class);
        PortfolioCategory::observe(PortfolioCategoryObserver::class);
        PortfolioDislike::observe(PortfolioDislikeObserver::class);
        PortfolioImage::observe(PortfolioImageObserver::class);
        PortfolioLike::observe(PortfolioLikeObserver::class);
        PriceList::observe(PriceListObserver::class);
        Procedure::observe(ProcedureObserver::class);
        ProcedureCategory::observe(ProcedureCategoryObserver::class);
        Product::observe(ProductObserver::class);
        ProductCategory::observe(ProductCategoryObserver::class);
        Progress::observe(ProgressObserver::class);
        Promotion::observe(PromotionObserver::class);
        ProposalDocument::observe(ProposalDocumentObserver::class);
        Quote::observe(QuoteObserver::class);
        Refund::observe(RefundObserver::class);
        RegisterInfluencer::observe(RegisterInfluencerObserver::class);
        Revision::observe(RevisionObserver::class);
        Rule::observe(RuleObserver::class);
        RuleCategory::observe(RuleCategoryObserver::class);
        Salary::observe(SalaryObserver::class);
        Service::observe(ServiceObserver::class);
        Setting::observe(SettingObserver::class);
        Sponsor::observe(SponsorObserver::class);
        Task::observe(TaskObserver::class);
        Template::observe(TemplateObserver::class);
        TemplateCategory::observe(TemplateCategoryObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        User::observe(UserObserver::class);
        Withdraw::observe(WithdrawObserver::class);
        WithdrawCategory::observe(WithdrawCategoryObserver::class);

        if (env('APP_ENV') == 'production') {
            URL::forceScheme('https');
        }

        if (env('APP_ENV') == 'testing') {
            Artisan::call('migrate:fresh --seed');
        }

        $this->subDomain = 'cms';
        View::share('subDomain', $this->subDomain);
    }
}
