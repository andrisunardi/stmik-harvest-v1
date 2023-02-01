<?php

namespace App\Http\Livewire\CMS\Profile;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class ActivityLogComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Activity Log';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-user-clock';
        $this->pageTable = 'activitiy_log';
        $this->pageCategoryName = 'Profile';
        $this->pageCategoryTitle = trans('index.'.Str::snake($this->pageCategoryName));
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public function getActivities()
    {
        return Activity::with('subject', 'causer')
            ->where('causer_id', Auth::user()->id)
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}", [
            'activities' => $this->getActivities(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
