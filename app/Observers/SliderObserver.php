<?php

namespace App\Observers;

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class SliderObserver
{
    public function creating(Slider $slider)
    {
        $slider->created_by_id = Auth::user()->id ?? null;
        $slider->updated_by_id = Auth::user()->id ?? null;
    }

    public function created(Slider $slider)
    {
    }

    public function updating(Slider $slider)
    {
        $slider->updated_by_id = Auth::user()->id ?? null;
    }

    public function updated(Slider $slider)
    {
    }

    public function deleting(Slider $slider)
    {
        $slider->deleted_by_id = Auth::user()->id ?? null;
        $slider->save();
    }

    public function deleted(Slider $slider)
    {
    }

    public function restoring(Slider $slider)
    {
        $slider->deleted_by_id = null;
        $slider->save();
    }

    public function restored(Slider $slider)
    {
    }

    public function forceDeleted(Slider $slider)
    {
    }
}
