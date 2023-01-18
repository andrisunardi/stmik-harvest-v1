<?php

namespace App\Http\Livewire\CMS;

use App\Models\AdmissionCalendar;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Network;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\Procedure;
use App\Models\Registration;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimony;
use App\Models\TuitionFee;
use App\Models\User;
use App\Models\Value;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

    public function getBgClass()
    {
        return collect(['bg-primary', 'bg-success', 'bg-warning', 'bg-danger', 'bg-info', 'bg-secondary']);
    }

    public function getPages()
    {
        return collect([[
            'name' => trans('index.registration'),
            'icon' => 'fas fa-pen fa-fw',
            'total' => Registration::cursor()->count(),
            'url' => route("{$this->subDomain}.registration.index"),
        ], [
            'name' => trans('index.contact'),
            'icon' => 'fas fa-phone fa-fw',
            'total' => Contact::cursor()->count(),
            'url' => route("{$this->subDomain}.contact.index"),
        ], [
            'name' => trans('index.newsletter'),
            'icon' => 'fas fa-envelopes-bulk fa-fw',
            'total' => Newsletter::cursor()->count(),
            'url' => route("{$this->subDomain}.newsletter.index"),
        ], [
            'name' => trans('index.blog'),
            'icon' => 'fas fa-bell fa-fw',
            'total' => Blog::cursor()->count(),
            'url' => route("{$this->subDomain}.blog.index"),
        ], [
            'name' => trans('index.blog_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => BlogCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.blog.category.index"),
        ], [
            'name' => trans('index.event'),
            'icon' => 'fas fa-calendar-day fa-fw',
            'total' => Event::cursor()->count(),
            'url' => route("{$this->subDomain}.event.index"),
        ], [
            'name' => trans('index.event_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => EventCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.event.category.index"),
        ], [
            'name' => trans('index.admission_calendar'),
            'icon' => 'fas fa-calendar fa-fw',
            'total' => AdmissionCalendar::cursor()->count(),
            'url' => route("{$this->subDomain}.admission-calendar.index"),
        ], [
            'name' => trans('index.banner'),
            'icon' => 'fas fa-image fa-fw',
            'total' => Banner::cursor()->count(),
            'url' => route("{$this->subDomain}.banner.index"),
        ], [
            'name' => trans('index.faq'),
            'icon' => 'fas fa-question fa-fw',
            'total' => Faq::cursor()->count(),
            'url' => route("{$this->subDomain}.faq.index"),
        ], [
            'name' => trans('index.gallery'),
            'icon' => 'fas fa-photo-film fa-fw',
            'total' => Gallery::cursor()->count(),
            'url' => route("{$this->subDomain}.gallery.index"),
        ], [
            'name' => trans('index.network'),
            'icon' => 'fas fa-sitemap fa-fw',
            'total' => Network::cursor()->count(),
            'url' => route("{$this->subDomain}.network.index"),
        ], [
            'name' => trans('index.offer'),
            'icon' => 'fas fa-gift fa-fw',
            'total' => Offer::cursor()->count(),
            'url' => route("{$this->subDomain}.offer.index"),
        ], [
            'name' => trans('index.procedure'),
            'icon' => 'fas fa-list fa-fw',
            'total' => Procedure::cursor()->count(),
            'url' => route("{$this->subDomain}.procedure.index"),
        ], [
            'name' => trans('index.slider'),
            'icon' => 'fas fa-sliders fa-fw',
            'total' => Slider::cursor()->count(),
            'url' => route("{$this->subDomain}.slider.index"),
        ], [
            'name' => trans('index.testimony'),
            'icon' => 'fas fa-comments fa-fw',
            'total' => Testimony::cursor()->count(),
            'url' => route("{$this->subDomain}.testimony.index"),
        ], [
            'name' => trans('index.tuition_fee'),
            'icon' => 'fas fa-money-check-dollar fa-fw',
            'total' => TuitionFee::cursor()->count(),
            'url' => route("{$this->subDomain}.tuition-fee.index"),
        ], [
            'name' => trans('index.value'),
            'icon' => 'fas fa-star fa-fw',
            'total' => Value::cursor()->count(),
            'url' => route("{$this->subDomain}.value.index"),
        ], [
            'name' => trans('index.user'),
            'icon' => 'fas fa-user fa-fw',
            'total' => User::cursor()->count(),
            'url' => route("{$this->subDomain}.configuration.user.index"),
        ], [
            'name' => trans('index.activity'),
            'icon' => 'fas fa-history fa-fw',
            'total' => Activity::cursor()->count(),
            'url' => route("{$this->subDomain}.configuration.activity.index"),
        ], [
            'name' => trans('index.role'),
            'icon' => 'fas fa-suitcase fa-fw',
            'total' => Role::cursor()->count(),
            'url' => route("{$this->subDomain}.configuration.role.index"),
        ], [
            'name' => trans('index.permission'),
            'icon' => 'fas fa-key fa-fw',
            'total' => Permission::cursor()->count(),
            'url' => route("{$this->subDomain}.configuration.permission.index"),
        ], [
            'name' => trans('index.setting'),
            'icon' => 'fas fa-gear fa-fw',
            'total' => Setting::cursor()->count(),
            'url' => route("{$this->subDomain}.configuration.setting.index"),
        ]]);
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageSlug}.index", [
            'bgClass' => $this->getBgClass(),
            'pages' => $this->readyToLoad ? $this->getPages() : collect(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
