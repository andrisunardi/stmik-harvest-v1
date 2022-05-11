<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

use App\Models\Log;

class HistoryComponent extends Component
{
    use WithPagination;

    public $menu_name = "History";
    public $menu_icon = "bi bi-clock-history";
    public $menu_slug = "history";
    public $menu_table = "log";
    public $menu_type = "index";

    public $page = 1;
    public $log;
    public $row;

    public $queryString = [
        "page" => ["except" => 1],
        "menu_type" => ["except" => "index"],
        "row" => ["except" => ""],
    ];

    public function mount()
    {
        if ($this->menu_type != "index" &&$this->menu_type != "view") {
            Session::flash("danger", trans("general.Menu Type") . " " . trans("message.not found or has been deleted"));
            return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
        }

        if ($this->menu_type == "add") {
            $this->active = true;
        }

        if ($this->row && ($this->menu_type != "index" || $this->menu_type != "trash")) {
            $this->log = Log::find($this->row);

            if (!$this->log) {
                Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
                return redirect()->route("{$this->sub_domain}.{$this->menu_slug}.index");
            }
        }
    }

    public function index()
    {
        $this->menu_type = "index";
        $this->row = null;
    }

    public function view($id)
    {
        $this->menu_type = "view";
        $this->row = $id;

        $this->log = Log::find($id);

        if (!$this->log) {
            return Session::flash("danger", trans("page.{$this->menu_name}") . " " . trans("message.not found or has been deleted"));
        }
    }

    public function getDataLog()
    {
        if ($this->menu_type == "index") {
            return Log::onlyActive()->orderByDesc("id")->paginate(10);
        }
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index", [
            "data_log" => $this->getDataLog(),
        ])->extends("{$this->sub_domain}.layouts.app")->section("content");
    }
}
