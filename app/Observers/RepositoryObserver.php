<?php

namespace App\Observers;

use App\Models\Repository;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class RepositoryObserver
{
    protected $name = "Repository";

    public function creating(Repository $repository)
    {
        $repository->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Repository $repository)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Repository $repository)
    {
        $repository->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Repository $repository)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Repository $repository)
    {
        $repository->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository->save();
    }

    public function deleted(Repository $repository)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Repository $repository)
    {
        $repository->deleted_by = null;
    }

    public function restored(Repository $repository)
    {
        $menu = Menu::where("name", $this->name)->first();

        $repository->deleted_by = null;
        $repository->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Repository $repository)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository->id;
        $log->activity = 5;
        $log->save();
    }
}
