<?php

namespace App\Observers;

use App\Models\Faq;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class FaqObserver
{
    protected $name = "Faq";

    public function creating(Faq $faq)
    {
        $faq->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $faq->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Faq $faq)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Faq $faq)
    {
        $faq->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Faq $faq)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Faq $faq)
    {
        $faq->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $faq->save();
    }

    public function deleted(Faq $faq)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Faq $faq)
    {
        $faq->deleted_by = null;
    }

    public function restored(Faq $faq)
    {
        $menu = Menu::where("name", $this->name)->first();

        $faq->deleted_by = null;
        $faq->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Faq $faq)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq->id;
        $log->activity = 5;
        $log->save();
    }
}
