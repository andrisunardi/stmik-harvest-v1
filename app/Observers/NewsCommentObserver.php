<?php

namespace App\Observers;

use App\Models\NewsComment;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class NewsCommentObserver
{
    protected $name = "News Comment";

    public function creating(NewsComment $news_comment)
    {
        $news_comment->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $news_comment->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(NewsComment $news_comment)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_comment->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(NewsComment $news_comment)
    {
        $news_comment->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(NewsComment $news_comment)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_comment->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(NewsComment $news_comment)
    {
        $news_comment->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $news_comment->save();
    }

    public function deleted(NewsComment $news_comment)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_comment->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(NewsComment $news_comment)
    {
        $news_comment->deleted_by = null;
    }

    public function restored(NewsComment $news_comment)
    {
        $menu = Menu::where("name", $this->name)->first();

        $news_comment->deleted_by = null;
        $news_comment->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_comment->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(NewsComment $news_comment)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $news_comment->id;
        $log->activity = 5;
        $log->save();
    }
}
