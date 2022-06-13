<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\Banner;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class EventComponent extends Component
{
    use WithPagination;

    public $menu_name = "Event";
    public $menu_icon = "fas fa-newspaper";
    public $menu_slug = "event";
    public $menu_table = "event";

    public $page = 1;
    public $search;
    public $category;

    public $queryString = [
        "page" => ["except" => 1],
        "search" => ["except" => ""],
        "category" => ["except" => ""],
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
        $this->banner = Banner::find(14);

        $this->event_category = EventCategory::where("slug", $this->category)->first();

        if ($this->category && !$this->event_category) {
            Session::flash("danger", trans("page.Event Category") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_event_category = EventCategory::onlyActive()->orderBy("name")->get();

        $this->data_recent_event = Event::onlyActive()->orderByDesc("start")->limit(3)->get();

        $this->data_popular_tags = Event::onlyActive()->orderByDesc("start")->first();
    }

    public function render()
    {
        $data_event = Event::when($this->search, fn ($query) =>
            $query->where("name", "like", "%{$this->search}%")
                ->orWhere("name_id", "like", "%{$this->search}%")
                ->orWhere("description", "like", "%{$this->search}%")
                ->orWhere("description_id", "like", "%{$this->search}%")
            )->when($this->category, fn ($query) =>
                $query->where("event_category_id", $this->event_category->id)
            )->onlyActive()->orderByDesc("id");

        if ($this->search) {
            Session::flash("success", trans("message.Found") . " <b>'{$data_event->count()}'</b> " . trans("message.results for") . " <b>'{$this->search}'</b>");
        }

        $data_event = $data_event->paginate(10);

        return view("livewire.{$this->menu_slug}.index", ["data_event" => $data_event])->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
