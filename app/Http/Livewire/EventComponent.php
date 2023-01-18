<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class EventComponent extends Component
{
    use WithPagination;

    public $page = 1;

    public $search;

    public $category;

    public $eventCategory;

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->eventCategory = EventCategory::where('slug', $this->category)->first();

        if ($this->category && ! $this->eventCategory) {
            abort(404);
            Session::flash('danger', trans('index.event_category').' '.trans('index.not_found_or_has_been_deleted'));

            return redirect()->route("{$this->menu_slug}.index");
        }
    }

    public function getBanner()
    {
        return Banner::find(14);
    }

    public function getEvents()
    {
        $data_event = Event::when($this->search, fn ($query) => $query->where('title', 'like', "%{$this->search}%")
            ->orWhere('title_idn', 'like', "%{$this->search}%")
            ->orWhere('short_body', 'like', "%{$this->search}%")
            ->orWhere('short_body_idn', 'like', "%{$this->search}%")
            ->orWhere('body', 'like', "%{$this->search}%")
            ->orWhere('body_idn', 'like', "%{$this->search}%")
        )->when($this->category, fn ($query) => $query->where('event_category_id', $this->eventCategory->id)
        )->active()->orderByDesc('id');

        if ($this->search) {
            Session::flash('success', trans('index.found')." <b>'{$data_event->count()}'</b> ".trans('index.results_for')." <b>'{$this->search}'</b>");
        }

        return $data_event->paginate(10);
    }

    public function render()
    {
        return view('livewire.event.index', [
            'banner' => $this->getBanner(),
            'events' => $this->getEvents(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
