<?php

namespace App\Observers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingObserver
{
    public function creating(Setting $setting)
    {
        $setting->created_by_id = Auth::user()->id ?? null;
        $setting->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Setting $setting)
    {
    }

    public function updating(Setting $setting)
    {
        $setting->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Setting $setting)
    {
    }

    public function deleting(Setting $setting)
    {
        $setting->deleted_by_id = Auth::user()->id ?? null;
        $setting->save();
    }

    public function deleted(Setting $setting)
    {
    }

    public function restoring(Setting $setting)
    {
        $setting->deleted_by_id = null;
        $setting->save();
    }

    public function restored(Setting $setting)
    {
    }

    public function forceDeleted(Setting $setting)
    {
    }
}
