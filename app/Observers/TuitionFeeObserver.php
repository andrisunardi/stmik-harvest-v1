<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Menu;
use App\Models\TuitionFee;
use Illuminate\Support\Facades\Auth;

class TuitionFeeObserver
{
    protected $name = 'Tuition Fee';

    public function creating(TuitionFee $tuition_fee)
    {
        $tuition_fee->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $tuition_fee->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(TuitionFee $tuition_fee)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $tuition_fee->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(TuitionFee $tuition_fee)
    {
        $tuition_fee->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(TuitionFee $tuition_fee)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $tuition_fee->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(TuitionFee $tuition_fee)
    {
        $tuition_fee->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $tuition_fee->save();
    }

    public function deleted(TuitionFee $tuition_fee)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $tuition_fee->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(TuitionFee $tuition_fee)
    {
        $tuition_fee->deleted_by = null;
    }

    public function restored(TuitionFee $tuition_fee)
    {
        $menu = Menu::where('name', $this->name)->first();

        $tuition_fee->deleted_by = null;
        $tuition_fee->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $tuition_fee->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(TuitionFee $tuition_fee)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $tuition_fee->id;
        $log->activity = 5;
        $log->save();
    }
}
