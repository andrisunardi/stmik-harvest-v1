<?php

namespace App\Observers;

use App\Models\GameCategory;
use Illuminate\Support\Facades\Auth;

class GameCategoryObserver
{
    public function creating(GameCategory $gameCategory)
    {
        $gameCategory->created_by_id = Auth::user()->id;
        $gameCategory->updated_by_id = Auth::user()->id;
    }

    public function created(GameCategory $gameCategory)
    {
    }

    public function updating(GameCategory $gameCategory)
    {
        $gameCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(GameCategory $gameCategory)
    {
    }

    public function deleting(GameCategory $gameCategory)
    {
        $gameCategory->deleted_by_id = Auth::user()->id;
        $gameCategory->save();
    }

    public function deleted(GameCategory $gameCategory)
    {
    }

    public function restoring(GameCategory $gameCategory)
    {
        $gameCategory->deleted_by_id = null;
        $gameCategory->save();
    }

    public function restored(GameCategory $gameCategory)
    {
    }

    public function forceDeleted(GameCategory $gameCategory)
    {
    }
}
