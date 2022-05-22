<?php

namespace App\Observers;

use App\Models\Newsletter;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class NewsletterObserver
{
    protected $name = "Newsletter";

    public function creating(Newsletter $newsletter)
    {
        $newsletter->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $newsletter->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Newsletter $newsletter)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $newsletter->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Newsletter $newsletter)
    {
        $newsletter->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Newsletter $newsletter)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $newsletter->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Newsletter $newsletter)
    {
        $newsletter->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $newsletter->save();
    }

    public function deleted(Newsletter $newsletter)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $newsletter->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Newsletter $newsletter)
    {
        $newsletter->deleted_by = null;
    }

    public function restored(Newsletter $newsletter)
    {
        $menu = Menu::where("name", $this->name)->first();

        $newsletter->deleted_by = null;
        $newsletter->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $newsletter->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Newsletter $newsletter)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $newsletter->id;
        $log->activity = 5;
        $log->save();
    }
}
