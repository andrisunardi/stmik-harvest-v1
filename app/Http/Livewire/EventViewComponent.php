<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use App\Models\Banner;
use App\Models\Event;
use Illuminate\Support\Facades\Session;

class eventViewComponent extends Component
{
    public $menu_name = "Event";
    public $menu_icon = "fas fa-newspaper";
    public $menu_slug = "event";
    public $menu_table = "event";

    public $event;
    public $name;
    public $email;
    public $phone;
    public $title;
    public $message;

    public function rules()
    {
        return [
            "name"      => "required|max:50",
            "phone"     => "nullable|max:15",
            "email"     => "required|email|max:50",
            "title"     => "nullable|max:100",
            "message"   => "required|max:1000",
        ];
    }

    public function mount($event_slug)
    {
        $this->banner = Banner::find(15);

        $this->event = Event::where("slug", $event_slug)->onlyActive()->first();

        if (!$this->event) {
            Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));

            return redirect()->route("{$this->menu_slug}.index");
        }

        $this->data_other_event = Event::where("id", "!=", $this->event->id)
            ->onlyActive()
            ->inRandomOrder()
            ->limit("3")
            ->get();

        $this->data_recent_event = Event::onlyActive()->orderByDesc("id")->limit(3)->get();

        $this->data_popular_tags = Event::onlyActive()->orderByDesc("id")->first();
    }

    public function render()
    {
        $this->event->refresh();

        return view("livewire.{$this->menu_slug}.view")->extends("layouts.app", ["banner" => $this->banner])->section("content");
    }
}
