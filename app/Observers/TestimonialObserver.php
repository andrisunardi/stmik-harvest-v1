<?php

namespace App\Observers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialObserver
{
    public function creating(Testimonial $testimonial)
    {
        $testimonial->created_by_id = Auth::user()->id;
        $testimonial->updated_by_id = Auth::user()->id;
    }

    public function created(Testimonial $testimonial)
    {
    }

    public function updating(Testimonial $testimonial)
    {
        $testimonial->updated_by_id = Auth::user()->id;
    }

    public function updated(Testimonial $testimonial)
    {
    }

    public function deleting(Testimonial $testimonial)
    {
        $testimonial->deleted_by_id = Auth::user()->id;
        $testimonial->save();
    }

    public function deleted(Testimonial $testimonial)
    {
    }

    public function restoring(Testimonial $testimonial)
    {
        $testimonial->deleted_by_id = null;
        $testimonial->save();
    }

    public function restored(Testimonial $testimonial)
    {
    }

    public function forceDeleted(Testimonial $testimonial)
    {
    }
}
