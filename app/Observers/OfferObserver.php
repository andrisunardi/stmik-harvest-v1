<?php

namespace App\Observers;

use App\Models\Offer;
use App\Models\Menu;
use App\Models\Log;

use Illuminate\Support\Facades\Auth;

class OfferObserver
{
    protected $name = "Offer";

    public function creating(Offer $offer)
    {
        $offer->created_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $offer->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(Offer $offer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $offer->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(Offer $offer)
    {
        $offer->updated_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(Offer $offer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $offer->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(Offer $offer)
    {
        $offer->deleted_by = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $offer->save();
    }

    public function deleted(Offer $offer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $offer->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(Offer $offer)
    {
        $offer->deleted_by = null;
    }

    public function restored(Offer $offer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $offer->deleted_by = null;
        $offer->save();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $offer->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(Offer $offer)
    {
        $menu = Menu::where("name", $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard("admin")->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $offer->id;
        $log->activity = 5;
        $log->save();
    }
}
