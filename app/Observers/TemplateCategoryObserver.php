<?php

namespace App\Observers;

use App\Models\TemplateCategory;
use Illuminate\Support\Facades\Auth;

class TemplateCategoryObserver
{
    public function creating(TemplateCategory $templateCategory)
    {
        $templateCategory->created_by_id = Auth::user()->id;
        $templateCategory->updated_by_id = Auth::user()->id;
    }

    public function created(TemplateCategory $templateCategory)
    {
    }

    public function updating(TemplateCategory $templateCategory)
    {
        $templateCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(TemplateCategory $templateCategory)
    {
    }

    public function deleting(TemplateCategory $templateCategory)
    {
        $templateCategory->deleted_by_id = Auth::user()->id;
        $templateCategory->save();
    }

    public function deleted(TemplateCategory $templateCategory)
    {
    }

    public function restoring(TemplateCategory $templateCategory)
    {
        $templateCategory->deleted_by_id = null;
        $templateCategory->save();
    }

    public function restored(TemplateCategory $templateCategory)
    {
    }

    public function forceDeleted(TemplateCategory $templateCategory)
    {
    }
}
