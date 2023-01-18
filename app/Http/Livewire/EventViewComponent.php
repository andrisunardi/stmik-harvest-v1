<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Session;

class EventViewComponent extends Component
{
    public $event;

    public function mount($slug)
    {
        $this->event = Event::where('slug', $slug)->active()->first();

        if (! $this->event) {
            Session::flash('danger', trans('index.event').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route('event.index');
        }
    }

    public function getBanner()
    {
        return Banner::find(14);
    }

    public function getRelatedEvents()
    {
        return Event::where('id', '!=', $this->event->id)
            ->where('event_category_id', $this->event->eventCategory->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function getEventCategories()
    {
        return EventCategory::active()->orderBy('name')->get();
    }

    public function getRecentEvents()
    {
        return Event::with('eventCategory')->active()->latest('start')->limit(3)->get();
    }

    public function getPopularTags()
    {
        return Event::active()->latest('start')->first();
    }

    public function render()
    {
        return view('livewire.event.view', [
            'banner' => $this->getBanner(),
            'relatedEvents' => $this->getRelatedEvents(),
            'eventCategories' => $this->getEventCategories(),
            'recentEvents' => $this->getRecentEvents(),
            'popularTags' => $this->getPopularTags(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
