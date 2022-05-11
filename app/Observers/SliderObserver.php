<?php

namespace App\Observers;

use App\Models\Slider;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class SliderObserver
{
    protected $name = "Slider";

    public function creating(Slider $slider)
    {
        $slider->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $slider->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Slider $slider)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $slider->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Slider $slider)
    {
        $slider->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Slider $slider)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $slider->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Slider $slider)
    {
        $slider->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $slider->save();
    }

    public function deleted(Slider $slider)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $slider->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Slider $slider)
    {
        $slider->deleted_by = null;
    }

    public function restored(Slider $slider)
    {
        $menu = Menu::where("name", $this->name)->first();

        $slider->deleted_by = null;
        $slider->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $slider->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Slider $slider)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $slider->id;
        $log->activity = 5;
        $log->save();
    }
}
