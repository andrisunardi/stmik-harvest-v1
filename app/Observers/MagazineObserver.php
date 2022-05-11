<?php

namespace App\Observers;

use App\Models\Magazine;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class MagazineObserver
{
    protected $name = "Magazine";

    public function creating(Magazine $magazine)
    {
        $magazine->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $magazine->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Magazine $magazine)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $magazine->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Magazine $magazine)
    {
        $magazine->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Magazine $magazine)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $magazine->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Magazine $magazine)
    {
        $magazine->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $magazine->save();
    }

    public function deleted(Magazine $magazine)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $magazine->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Magazine $magazine)
    {
        $magazine->deleted_by = null;
    }

    public function restored(Magazine $magazine)
    {
        $menu = Menu::where("name", $this->name)->first();

        $magazine->deleted_by = null;
        $magazine->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $magazine->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Magazine $magazine)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $magazine->id;
        $log->activity = 5;
        $log->save();
    }
}
