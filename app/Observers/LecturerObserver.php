<?php

namespace App\Observers;

use App\Models\Lecturer;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class LecturerObserver
{
    protected $name = "Lecturer";

    public function creating(Lecturer $lecturer)
    {
        $lecturer->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $lecturer->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Lecturer $lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Lecturer $lecturer)
    {
        $lecturer->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Lecturer $lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Lecturer $lecturer)
    {
        $lecturer->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $lecturer->save();
    }

    public function deleted(Lecturer $lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Lecturer $lecturer)
    {
        $lecturer->deleted_by = null;
    }

    public function restored(Lecturer $lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $lecturer->deleted_by = null;
        $lecturer->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Lecturer $lecturer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $lecturer->id;
        $log->activity = 5;
        $log->save();
    }
}
