<?php

namespace App\Observers;

use App\Models\RepositorySubject;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class RepositorySubjectObserver
{
    protected $name = "Repository Subject";

    public function creating(RepositorySubject $repository_subject)
    {
        $repository_subject->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository_subject->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(RepositorySubject $repository_subject)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_subject->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(RepositorySubject $repository_subject)
    {
        $repository_subject->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(RepositorySubject $repository_subject)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_subject->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(RepositorySubject $repository_subject)
    {
        $repository_subject->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $repository_subject->save();
    }

    public function deleted(RepositorySubject $repository_subject)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_subject->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(RepositorySubject $repository_subject)
    {
        $repository_subject->deleted_by = null;
    }

    public function restored(RepositorySubject $repository_subject)
    {
        $menu = Menu::where("name", $this->name)->first();

        $repository_subject->deleted_by = null;
        $repository_subject->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_subject->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(RepositorySubject $repository_subject)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $repository_subject->id;
        $log->activity = 5;
        $log->save();
    }
}
