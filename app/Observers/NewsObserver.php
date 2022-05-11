<?php

namespace App\Observers;

use App\Models\News;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class NewsObserver
{
    protected $name = "News";

    public function creating(News $news)
    {
        $news->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $news->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(News $news)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(News $news)
    {
        $news->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(News $news)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(News $news)
    {
        $news->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $news->save();
    }

    public function deleted(News $news)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(News $news)
    {
        $news->deleted_by = null;
    }

    public function restored(News $news)
    {
        $menu = Menu::where("name", $this->name)->first();

        $news->deleted_by = null;
        $news->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(News $news)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news->id;
        $log->activity = 5;
        $log->save();
    }
}
