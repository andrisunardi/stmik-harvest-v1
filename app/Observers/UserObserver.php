<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    protected $name = 'User';

    public function creating(User $user)
    {
        $user->created_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $user->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(User $user)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $user->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(User $user)
    {
        $user->updated_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(User $user)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $user->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(User $user)
    {
        $user->deleted_by = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $user->save();
    }

    public function deleted(User $user)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $user->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(User $user)
    {
        $user->deleted_by = null;
    }

    public function restored(User $user)
    {
        $menu = Menu::where('name', $this->name)->first();

        $user->deleted_by = null;
        $user->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $user->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(User $user)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $user->id;
        $log->activity = 5;
        $log->save();
    }
}
