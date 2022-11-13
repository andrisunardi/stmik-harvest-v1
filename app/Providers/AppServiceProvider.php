<?php

namespace App\Providers;

use App\Models\Access;
use App\Models\AccessMenu;
use App\Models\Admin;
use App\Models\AdmissionCalendar;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Log;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Network;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\Procedure;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimony;
use App\Models\TuitionFee;
use App\Models\User;
use App\Models\Value;
use App\Observers\AccessMenuObserver;
use App\Observers\AccessObserver;
use App\Observers\AdminObserver;
use App\Observers\AdmissionCalendarObserver;
use App\Observers\BannerObserver;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogObserver;
use App\Observers\ContactObserver;
use App\Observers\EventCategoryObserver;
use App\Observers\EventObserver;
use App\Observers\FaqObserver;
use App\Observers\GalleryObserver;
use App\Observers\LogObserver;
use App\Observers\MenuCategoryObserver;
use App\Observers\MenuObserver;
use App\Observers\NetworkObserver;
use App\Observers\NewsletterObserver;
use App\Observers\OfferObserver;
use App\Observers\ProcedureObserver;
use App\Observers\SettingObserver;
use App\Observers\SliderObserver;
use App\Observers\TestimonyObserver;
use App\Observers\TuitionFeeObserver;
use App\Observers\UserObserver;
use App\Observers\ValueObserver;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
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
                // } else if ($value % 7 == 0) {
            //     $color = "light";
                // } else if ($value % 8 == 0) {
            //     $color = "dark";
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
    }

    public function boot()
    {
        Access::observe(AccessObserver::class);
        AccessMenu::observe(AccessMenuObserver::class);
        Admin::observe(AdminObserver::class);
        AdmissionCalendar::observe(AdmissionCalendarObserver::class);
        Banner::observe(BannerObserver::class);
        Blog::observe(BlogObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
        Contact::observe(ContactObserver::class);
        Event::observe(EventObserver::class);
        EventCategory::observe(EventCategoryObserver::class);
        Faq::observe(FaqObserver::class);
        Gallery::observe(GalleryObserver::class);
        Log::observe(LogObserver::class);
        Menu::observe(MenuObserver::class);
        MenuCategory::observe(MenuCategoryObserver::class);
        Network::observe(NetworkObserver::class);
        Newsletter::observe(NewsletterObserver::class);
        Offer::observe(OfferObserver::class);
        Procedure::observe(ProcedureObserver::class);
        Setting::observe(SettingObserver::class);
        Slider::observe(SliderObserver::class);
        Testimony::observe(TestimonyObserver::class);
        TuitionFee::observe(TuitionFeeObserver::class);
        Value::observe(ValueObserver::class);
        User::observe(UserObserver::class);

        Schema::defaultStringLength(191);

        if (env('APP_ENV') == 'production') {
            URL::forceScheme('https');
        }

        if (env('APP_ENV') == 'testing') {
            Artisan::call('migrate:fresh --seed');
        }

        // $this->sub_domain = env("APP_ENV") == "production" ? explode(".", Request::url())[1] : Request::segment(1);
        $this->sub_domain = Request::segment(1);
        View::share('sub_domain', $this->sub_domain);

        if (Schema::hasTable('banner')) {
            $this->banner = Banner::active()->orderBy('id')->first();
            View::share('banner', $this->banner);
        }

        if (Schema::hasTable('setting')) {
            $this->setting = Setting::active()->orderByDesc('id')->first();
            View::share('setting', $this->setting);
        }
    }
}
