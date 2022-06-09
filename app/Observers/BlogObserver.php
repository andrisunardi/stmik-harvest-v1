<?php

namespace App\Observers;

use App\Models\Blog;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class BlogObserver
{
    protected $name = "Blog";

    public function creating(Blog $blog)
    {
        $blog->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $blog->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Blog $blog)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Blog $blog)
    {
        $blog->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Blog $blog)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Blog $blog)
    {
        $blog->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $blog->save();
    }

    public function deleted(Blog $blog)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Blog $blog)
    {
        $blog->deleted_by = null;
    }

    public function restored(Blog $blog)
    {
        $menu = Menu::where("name", $this->name)->first();

        $blog->deleted_by = null;
        $blog->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Blog $blog)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog->id;
        $log->activity = 5;
        $log->save();
    }
}
