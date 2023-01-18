<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventCategory;

class EventSidebarComponent extends Component
{
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
        return view('livewire.event.sidebar', [
            'eventCategories' => $this->getEventCategories(),
            'recentEvents' => $this->getRecentEvents(),
            'popularTags' => $this->getPopularTags(),
        ])->extends('layouts.app')->section('content');
    }
}
