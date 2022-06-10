<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Livewire\Component as LivewireComponent;

use App\Models\Registration;
use App\Models\Contact;
use App\Models\Newsletter;

use App\Models\Blog;
use App\Models\BlogCategory;

use App\Models\Event;
use App\Models\EventCategory;

use App\Models\AdmissionCalendar;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Network;
use App\Models\Offer;
use App\Models\Procedure;
use App\Models\Slider;
use App\Models\Testimony;
use App\Models\TuitionFee;
use App\Models\Value;

use App\Models\Admin;
use App\Models\Access;
use App\Models\AccessMenu;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Setting;
use App\Models\Log;

class Component extends LivewireComponent
{
    public $sub_domain = "cms";

    public function boot()
    {
        View::share("sub_domain", $this->sub_domain);

        $this->setting = Setting::onlyActive()->orderByDesc("id")->first();
        View::share("setting", $this->setting);

        // $this->data_all_menu = Menu::whereNotNull("show")->where(function ($query) {
        //     $query->whereNotNull("show")->where("sub", 1)->whereNull("menu_id");
        // })->orWhere(function ($query) {
        //     $query->whereNotNull("show")->whereNull("sub")->whereNull("menu_id");
        // })->onlyActive()->orderBy("sort")->get();
        // View::share("data_all_menu", $this->data_all_menu);

        $this->data_all_menu = Menu::withoutMenuCategory()->orderBy("sort")->get();
        View::share("data_all_menu", $this->data_all_menu);

        $this->data_all_menu_category = MenuCategory::onlyActive()->orderBy("sort")->get();
        View::share("data_all_menu_category", $this->data_all_menu_category);

        if (Auth::check()) {
            $this->data_access_menu_view = AccessMenu::where("access_id", Auth::user()->access_id)->where("view", 1)->onlyActive()->get()->toArray();
            $this->access_menu_view = [];
            View::share("access_menu_view", $this->access_menu_view);
            foreach ($this->data_access_menu_view as $access_menu_view) {
                $this->access_menu_view[] = $access_menu_view["menu_id"];
                View::share("access_menu_view", $this->access_menu_view);
            }

            $this->data_access_menu_add = AccessMenu::where("access_id", Auth::user()->access_id)->where("add", 1)->onlyActive()->get()->toArray();
            $this->access_menu_add = [];
            View::share("access_menu_add", $this->access_menu_add);
            foreach ($this->data_access_menu_add as $access_menu_add) {
                $this->access_menu_add[] = $access_menu_add["menu_id"];
                View::share("access_menu_add", $this->access_menu_add);
            }

            $this->data_access_menu_edit = AccessMenu::where("access_id", Auth::user()->access_id)->where("edit", 1)->onlyActive()->get()->toArray();
            $this->access_menu_edit = [];
            View::share("access_menu_edit", $this->access_menu_edit);
            foreach ($this->data_access_menu_edit as $access_menu_edit) {
                $this->access_menu_edit[] = $access_menu_edit["menu_id"];
                View::share("access_menu_edit", $this->access_menu_edit);
            }

            $this->data_access_menu_delete = AccessMenu::where("access_id", Auth::user()->access_id)->where("delete", 1)->onlyActive()->get()->toArray();
            $this->access_menu_delete = [];
            View::share("access_menu_delete", $this->access_menu_delete);
            foreach ($this->data_access_menu_delete as $access_menu_delete) {
                $this->access_menu_delete[] = $access_menu_delete["menu_id"];
                View::share("access_menu_delete", $this->access_menu_delete);
            }
        }

        $this->total_registration = Registration::cursor()->count();
        View::share("total_registration", $this->total_registration);

        $this->total_contact = Contact::cursor()->count();
        View::share("total_contact", $this->total_contact);

        $this->total_newsletter = Newsletter::cursor()->count();
        View::share("total_newsletter", $this->total_newsletter);

        $this->total_blog = Blog::cursor()->count();
        View::share("total_blog", $this->total_blog);

        $this->total_blog_category = BlogCategory::cursor()->count();
        View::share("total_blog_category", $this->total_blog_category);

        $this->total_event = Event::cursor()->count();
        View::share("total_event", $this->total_event);

        $this->total_event_category = EventCategory::cursor()->count();
        View::share("total_event_category", $this->total_event_category);

        $this->total_admission_calendar = AdmissionCalendar::cursor()->count();
        View::share("total_admission_calendar", $this->total_admission_calendar);

        $this->total_banner = Banner::cursor()->count();
        View::share("total_banner", $this->total_banner);

        $this->total_faq = Faq::cursor()->count();
        View::share("total_faq", $this->total_faq);

        $this->total_gallery = Gallery::cursor()->count();
        View::share("total_gallery", $this->total_gallery);

        $this->total_network = Network::cursor()->count();
        View::share("total_network", $this->total_network);

        $this->total_offer = Offer::cursor()->count();
        View::share("total_offer", $this->total_offer);

        $this->total_procedure = Procedure::cursor()->count();
        View::share("total_procedure", $this->total_procedure);

        $this->total_slider = Slider::cursor()->count();
        View::share("total_slider", $this->total_slider);

        $this->total_testimony = Testimony::cursor()->count();
        View::share("total_testimony", $this->total_testimony);

        $this->total_tuition_fee = TuitionFee::cursor()->count();
        View::share("total_tuition_fee", $this->total_tuition_fee);

        $this->total_value = Value::cursor()->count();
        View::share("total_value", $this->total_value);

        $this->total_admin = Admin::cursor()->count();
        View::share("total_admin", $this->total_admin);

        $this->total_access = Access::cursor()->count();
        View::share("total_access", $this->total_access);

        $this->total_menu = Menu::cursor()->count();
        View::share("total_menu", $this->total_menu);

        $this->total_menu_category = MenuCategory::cursor()->count();
        View::share("total_menu_category", $this->total_menu_category);

        $this->total_setting = Setting::cursor()->count();
        View::share("total_setting", $this->total_setting);

        $this->total_log = Log::cursor()->count();
        View::share("total_log", $this->total_log);
    }

    public function message(string $message)
    {
        Session::flash("message", $message);
    }
}
