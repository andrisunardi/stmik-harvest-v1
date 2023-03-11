<?php

namespace App\Http\Livewire\CMS\Profile;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class ProfileComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Profile';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-id-card';
        $this->pageTable = 'users';
        $this->pageCategoryName = 'Profile';
        $this->pageCategoryTitle = Str::translate($this->pageCategoryName);
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public function lastActivity()
    {
        return Activity::with('subject', 'causer')->where('causer_id', Auth::user()->id)->get()->last();
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.index", [
            'lastActivity' => $this->lastActivity(),
        ])->extends("{$this->subDomain}.layouts.app")->section('content');
    }
}
