<?php

namespace App\Observers;

use App\Models\FaqCategory;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class FaqCategoryObserver
{
    protected $name = "Faq Category";

    public function creating(FaqCategory $faq_category)
    {
        $faq_category->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $faq_category->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(FaqCategory $faq_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq_category->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(FaqCategory $faq_category)
    {
        $faq_category->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(FaqCategory $faq_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq_category->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(FaqCategory $faq_category)
    {
        $faq_category->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $faq_category->save();
    }

    public function deleted(FaqCategory $faq_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq_category->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(FaqCategory $faq_category)
    {
        $faq_category->deleted_by = null;
    }

    public function restored(FaqCategory $faq_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $faq_category->deleted_by = null;
        $faq_category->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq_category->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(FaqCategory $faq_category)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $faq_category->id;
        $log->activity = 5;
        $log->save();
    }
}
