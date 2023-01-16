<?php

namespace App\Observers;

use App\Models\RuleCategory;
use Illuminate\Support\Facades\Auth;

class RuleCategoryObserver
{
    public function creating(RuleCategory $ruleCategory)
    {
        $ruleCategory->created_by_id = Auth::user()->id;
        $ruleCategory->updated_by_id = Auth::user()->id;
    }

    public function created(RuleCategory $ruleCategory)
    {
    }

    public function updating(RuleCategory $ruleCategory)
    {
        $ruleCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(RuleCategory $ruleCategory)
    {
    }

    public function deleting(RuleCategory $ruleCategory)
    {
        $ruleCategory->deleted_by_id = Auth::user()->id;
        $ruleCategory->save();
    }

    public function deleted(RuleCategory $ruleCategory)
    {
    }

    public function restoring(RuleCategory $ruleCategory)
    {
        $ruleCategory->deleted_by_id = null;
        $ruleCategory->save();
    }

    public function restored(RuleCategory $ruleCategory)
    {
    }

    public function forceDeleted(RuleCategory $ruleCategory)
    {
    }
}
