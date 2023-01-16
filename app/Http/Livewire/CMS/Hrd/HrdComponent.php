<?php

namespace App\Http\Livewire\CMS\Hrd;

use App\Http\Livewire\CMS\Component;
use App\Models\Absent;
use App\Models\Assignment;
use App\Models\BuyEndorse;
use App\Models\Career;
use App\Models\Client;
use App\Models\Employee;
use App\Models\RegisterInfluencer;
use App\Models\Sponsor;
use App\Models\Task;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Str;

class HrdComponent extends Component
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
        $this->pageName = 'HRD';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-user-tie';
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
            'name' => trans('index.absent'),
            'icon' => 'fas fa-check-to-slot fa-fw',
            'total' => Absent::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.absent.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.employee'),
            'icon' => 'fas fa-users fa-fw',
            'total' => Employee::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.employee.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.endorse'),
            'icon' => 'fas fa-people-group fa-fw',
            'total' => BuyEndorse::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.endorse.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.client'),
            'icon' => 'fas fa-user-tie fa-fw',
            'total' => Client::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.client.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.agent'),
            'icon' => 'fas fa-user-secret fa-fw',
            'total' => User::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.agent.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.career'),
            'icon' => 'fas fa-briefcase fa-fw',
            'total' => Career::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.career.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.register_influencer'),
            'icon' => 'fas fa-pen fa-fw',
            'total' => RegisterInfluencer::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.register-influencer.index"),
        ], [
            'class' => 'secondary',
            'name' => trans('index.sponsor'),
            'icon' => 'fas fa-people-line fa-fw',
            'total' => Sponsor::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.sponsor.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.testimonial'),
            'icon' => 'fas fa-comments fa-fw',
            'total' => Testimonial::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.testimonial.index"),
        ], [
            'class' => 'primary',
            'name' => trans('index.procedure'),
            'icon' => 'fas fa-rectangle-list fa-fw',
            'total' => Template::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.procedure.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.procedure_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => TemplateCategory::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.procedure.category.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.rule'),
            'icon' => 'fas fa-gavel fa-fw',
            'total' => Task::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.rule.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.rule_category'),
            'icon' => 'fas fa-tags fa-fw',
            'total' => Assignment::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.rule.category.index"),
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
