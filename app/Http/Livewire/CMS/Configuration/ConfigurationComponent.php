<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ConfigurationComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Configuration';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-gears';
        $this->pageTable = null;
        $this->pageCategoryName = null;
        $this->pageCategoryTitle = null;
        $this->pageCategorySlug = null;
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public function getPages()
    {
        return collect([[
            'class' => 'primary',
            'name' => trans('index.user'),
            'icon' => 'fas fa-user fa-fw',
            'total' => User::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.user.index"),
        ], [
            'class' => 'success',
            'name' => trans('index.activity'),
            'icon' => 'fas fa-history fa-fw',
            'total' => Activity::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.activity.index"),
        ], [
            'class' => 'warning',
            'name' => trans('index.role'),
            'icon' => 'fas fa-suitcase fa-fw',
            'total' => Role::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.role.index"),
        ], [
            'class' => 'danger',
            'name' => trans('index.permission'),
            'icon' => 'fas fa-key fa-fw',
            'total' => Permission::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.permission.index"),
        ], [
            'class' => 'info',
            'name' => trans('index.setting'),
            'icon' => 'fas fa-gear fa-fw',
            'total' => DB::table('settings')->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.setting.index"),
        ]]);
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageSlug}.index", [
            'pages' => $this->getPages(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
