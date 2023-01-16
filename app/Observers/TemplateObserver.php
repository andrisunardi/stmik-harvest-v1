<?php

namespace App\Observers;

use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class TemplateObserver
{
    public function creating(Template $template)
    {
        $template->created_by_id = Auth::user()->id;
        $template->updated_by_id = Auth::user()->id;
    }

    public function created(Template $template)
    {
    }

    public function updating(Template $template)
    {
        $template->updated_by_id = Auth::user()->id;
    }

    public function updated(Template $template)
    {
    }

    public function deleting(Template $template)
    {
        $template->deleted_by_id = Auth::user()->id;
        $template->save();
    }

    public function deleted(Template $template)
    {
    }

    public function restoring(Template $template)
    {
        $template->deleted_by_id = null;
        $template->save();
    }

    public function restored(Template $template)
    {
    }

    public function forceDeleted(Template $template)
    {
    }
}
