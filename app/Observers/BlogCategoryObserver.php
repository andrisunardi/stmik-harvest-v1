<?php

namespace App\Observers;

use App\Models\BlogCategory;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class BlogCategoryObserver
{
    protected $name = 'Blog Category';

    public function creating(BlogCategory $blog_category)
    {
        $blog_category->created_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $blog_category->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function created(BlogCategory $blog_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog_category->id;
        $log->activity = 1;
        $log->save();
    }

    public function updating(BlogCategory $blog_category)
    {
        $blog_category->updated_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
    }

    public function updated(BlogCategory $blog_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog_category->id;
        $log->activity = 2;
        $log->save();
    }

    public function deleting(BlogCategory $blog_category)
    {
        $blog_category->deleted_by_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $blog_category->save();
    }

    public function deleted(BlogCategory $blog_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog_category->id;
        $log->activity = 3;
        $log->save();
    }

    public function restoring(BlogCategory $blog_category)
    {
        $blog_category->deleted_by_id = null;
    }

    public function restored(BlogCategory $blog_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $blog_category->deleted_by_id = null;
        $blog_category->save();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog_category->id;
        $log->activity = 4;
        $log->save();
    }

    public function forceDeleted(BlogCategory $blog_category)
    {
        $menu = Menu::where('name', $this->name)->first();

        $log = new Log();
        $log->admin_id = Auth::guard('admin')->hasUser(Auth::user()) ? Auth::user()->id : 0;
        $log->menu_id = $menu->id;
        $log->row = $blog_category->id;
        $log->activity = 5;
        $log->save();
    }
}
