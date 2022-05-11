<?php

namespace App\Observers;

use App\Models\RepositoryFile;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class RepositoryFileObserver
{
    protected $name = "Repository File";

    public function creating(RepositoryFile $repository_file)
    {
        $repository_file->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository_file->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(RepositoryFile $repository_file)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_file->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(RepositoryFile $repository_file)
    {
        $repository_file->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(RepositoryFile $repository_file)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_file->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(RepositoryFile $repository_file)
    {
        $repository_file->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository_file->save();
    }

    public function deleted(RepositoryFile $repository_file)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_file->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(RepositoryFile $repository_file)
    {
        $repository_file->deleted_by = null;
    }

    public function restored(RepositoryFile $repository_file)
    {
        $menu = Menu::where("name", $this->name)->first();

        $repository_file->deleted_by = null;
        $repository_file->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_file->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(RepositoryFile $repository_file)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_file->id;
        $log->activity = 5;
        $log->save();
    }
}
