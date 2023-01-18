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

    public function getEvents()
    {
        $data_event = Event::when($this->search, fn ($query) => $query->where('name', 'like', "%{$this->search}%")
            ->orWhere('name_id', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->orWhere('description_id', 'like', "%{$this->search}%")
        )->when($this->category, fn ($query) => $query->where('event_category_id', $this->event_category->id)
        )->active()->orderByDesc('id');

        if ($this->search) {
            // Session::flash('success', trans('index.found')." <b>'{$data_event->count()}'</b> ".trans('index.results_for')." <b>'{$this->search}'</b>");
        }

        return $data_event->paginate(10);
    }

    public function getEventCategories()
    {
        return EventCategory::active()->orderBy('name')->get();
    }

    public function getOtherEvents()
    {
        return Event::where('id', '!=', $this->event->id)
            ->where('event_category_id', $this->event->event_category->id)
            ->active()
            ->inRandomOrder()
            ->limit('3')
            ->get();
    }

    public function getRecentEvents()
    {
        return Event::active()->latest('date')->limit(3)->get();
    }

    public function getPopularTag()
    {
        return Event::active()->latest('date')->first();
    }

    public function render()
    {
        return view('livewire.event.index', [
            'banner' => $this->getBanner(),
            'events' => $this->getEvents(),
            'eventCategories' => $this->getEventCategories(),
            'recentEvents' => $this->getRecentEvents(),
            'popularTag' => $this->getPopularTag(),
        ])->extends('layouts.app')->section('content');
    }
}
