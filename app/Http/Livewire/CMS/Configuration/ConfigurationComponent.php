<?php

namespace App\Http\Livewire\CMS\Configuration;

use App\Http\Livewire\CMS\Component;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ConfigurationComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Configuration';
        $this->pageTitle = Str::translate($this->pageName);
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
            'roles' => 'Super User',
            'permissions' => 'User',
            'name' => trans('index.user'),
            'icon' => 'fas fa-user fa-fw',
            'total' => User::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.user.index"),
        ], [
            'roles' => 'Super User',
            'permissions' => 'Activity',
            'name' => trans('index.activity'),
            'icon' => 'fas fa-history fa-fw',
            'total' => Activity::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.activity.index"),
        ], [
            'roles' => 'Super User',
            'permissions' => 'Role',
            'name' => trans('index.role'),
            'icon' => 'fas fa-suitcase fa-fw',
            'total' => Role::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.role.index"),
        ], [
            'roles' => 'Super User',
            'permissions' => 'Permission',
            'name' => trans('index.permission'),
            'icon' => 'fas fa-key fa-fw',
            'total' => Permission::cursor()->count(),
            'url' => route("{$this->subDomain}.{$this->pageSlug}.permission.index"),
        ], [
            'roles' => 'Super User',
            'permissions' => 'Setting',
            'name' => trans('index.setting'),
            'icon' => 'fas fa-gear fa-fw',
            'total' => Setting::cursor()->count(),
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
