<?php

namespace App\Observers;

use App\Models\Rule;
use Illuminate\Support\Facades\Auth;

class RuleObserver
{
    public function creating(Rule $rule)
    {
        $rule->created_by_id = Auth::user()->id;
        $rule->updated_by_id = Auth::user()->id;
    }

    public function created(Rule $rule)
    {
    }

    public function updating(Rule $rule)
    {
        $rule->updated_by_id = Auth::user()->id;
    }

    public function updated(Rule $rule)
    {
    }

    public function deleting(Rule $rule)
    {
        $rule->deleted_by_id = Auth::user()->id;
        $rule->save();
    }

    public function deleted(Rule $rule)
    {
    }

    public function restoring(Rule $rule)
    {
        $rule->deleted_by_id = null;
        $rule->save();
    }

    public function restored(Rule $rule)
    {
    }

    public function forceDeleted(Rule $rule)
    {
    }
}
