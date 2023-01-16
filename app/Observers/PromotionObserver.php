<?php

namespace App\Observers;

use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class PromotionObserver
{
    public function creating(Promotion $promotion)
    {
        $promotion->created_by_id = Auth::user()->id;
        $promotion->updated_by_id = Auth::user()->id;
    }

    public function created(Promotion $promotion)
    {
    }

    public function updating(Promotion $promotion)
    {
        $promotion->updated_by_id = Auth::user()->id;
    }

    public function updated(Promotion $promotion)
    {
    }

    public function deleting(Promotion $promotion)
    {
        $promotion->deleted_by_id = Auth::user()->id;
        $promotion->save();
    }

    public function deleted(Promotion $promotion)
    {
    }

    public function restoring(Promotion $promotion)
    {
        $promotion->deleted_by_id = null;
        $promotion->save();
    }

    public function restored(Promotion $promotion)
    {
    }

    public function forceDeleted(Promotion $promotion)
    {
    }
}
