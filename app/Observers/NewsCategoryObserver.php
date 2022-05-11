<?php

namespace App\Observers;

use App\Models\NewsCategory;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class NewsCategoryObserver
{
    protected $name = "News Category";

    public function creating(NewsCategory $news_category)
    {
        $news_category->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $news_category->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(NewsCategory $news_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_category->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(NewsCategory $news_category)
    {
        $news_category->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(NewsCategory $news_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_category->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(NewsCategory $news_category)
    {
        $news_category->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $news_category->save();
    }

    public function deleted(NewsCategory $news_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_category->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(NewsCategory $news_category)
    {
        $news_category->deleted_by = null;
    }

    public function restored(NewsCategory $news_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $news_category->deleted_by = null;
        $news_category->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_category->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(NewsCategory $news_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_category->id;
        $log->activity = 5;
        $log->save();
    }
}
