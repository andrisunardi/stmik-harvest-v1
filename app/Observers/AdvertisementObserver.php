<?php

namespace App\Observers;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class AdvertisementObserver
{
    public function creating(Advertisement $advertisement)
    {
        $advertisement->created_by_id = Auth::user()->id;
        $advertisement->updated_by_id = Auth::user()->id;
    }

    public function created(Advertisement $advertisement)
    {
    }

    public function updating(Advertisement $advertisement)
    {
        $advertisement->updated_by_id = Auth::user()->id;
    }

    public function updated(Advertisement $advertisement)
    {
    }

    public function deleting(Advertisement $advertisement)
    {
        $advertisement->deleted_by_id = Auth::user()->id;
        $advertisement->save();
    }

    public function deleted(Advertisement $advertisement)
    {
    }

    public function restoring(Advertisement $advertisement)
    {
        $advertisement->deleted_by_id = null;
        $advertisement->save();
    }

    public function restored(Advertisement $advertisement)
    {
    }

    public function forceDeleted(Advertisement $advertisement)
    {
    }
}
