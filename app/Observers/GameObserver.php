<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameObserver
{
    public function creating(Game $game)
    {
        $game->created_by_id = Auth::user()->id;
        $game->updated_by_id = Auth::user()->id;
    }

    public function created(Game $game)
    {
    }

    public function updating(Game $game)
    {
        $game->updated_by_id = Auth::user()->id;
    }

    public function updated(Game $game)
    {
    }

    public function deleting(Game $game)
    {
        $game->deleted_by_id = Auth::user()->id;
        $game->save();
    }

    public function deleted(Game $game)
    {
    }

    public function restoring(Game $game)
    {
        $game->deleted_by_id = null;
        $game->save();
    }

    public function restored(Game $game)
    {
    }

    public function forceDeleted(Game $game)
    {
    }
}
