<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Session;

class EventViewComponent extends Component
{
    public $menu_name = 'Event';

    public $menu_icon = 'fas fa-calendar';

    public $menu_slug = 'event';

    public $menu_table = 'event';

    public $event;

    public $name;

    public $email;

    public $phone;

    public $title;

    public $message;

    public function mount($event_slug)
    {
        $this->banner = Banner::find(14);

        $this->event = Event::where('slug', $event_slug)->active()->first();

        if (! $this->event) {
            Session::flash('danger', trans("index.{$this->menu_name}").' '.trans('index.not found or has been deleted'));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_other_event = Event::where('id', '!=', $this->event->id)
            ->where('event_category_id', $this->event->event_category->id)
            ->active()
            ->inRandomOrder()
            ->limit('2')
            ->get();

        $this->data_event_category = EventCategory::active()->orderBy('name')->get();

        $this->data_recent_event = Event::active()->orderByDesc('start')->limit(3)->get();

        $this->data_popular_tags = Event::active()->orderByDesc('start')->first();
    }

    public function render()
    {
        $this->event->refresh();

        return view("livewire.{$this->menu_slug}.view")->extends('layouts.app', ['banner' => $this->banner])->section('content');
    }
}
