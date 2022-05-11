<?php

namespace App\Observers;

use App\Models\RepositoryContributor;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class RepositoryContributorObserver
{
    protected $name = "Repository Contributor";

    public function creating(RepositoryContributor $repository_contributor)
    {
        $repository_contributor->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository_contributor->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(RepositoryContributor $repository_contributor)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_contributor->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(RepositoryContributor $repository_contributor)
    {
        $repository_contributor->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(RepositoryContributor $repository_contributor)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_contributor->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(RepositoryContributor $repository_contributor)
    {
        $repository_contributor->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository_contributor->save();
    }

    public function deleted(RepositoryContributor $repository_contributor)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_contributor->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(RepositoryContributor $repository_contributor)
    {
        $repository_contributor->deleted_by = null;
    }

    public function restored(RepositoryContributor $repository_contributor)
    {
        $menu = Menu::where("name", $this->name)->first();

        $repository_contributor->deleted_by = null;
        $repository_contributor->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_contributor->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(RepositoryContributor $repository_contributor)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_contributor->id;
        $log->activity = 5;
        $log->save();
    }
}
