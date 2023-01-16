<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    public function creating(Order $order)
    {
        $order->created_by_id = Auth::user()->id;
        $order->updated_by_id = Auth::user()->id;
    }

    public function created(Order $order)
    {
    }

    public function updating(Order $order)
    {
        $order->updated_by_id = Auth::user()->id;
    }

    public function updated(Order $order)
    {
    }

    public function deleting(Order $order)
    {
        $order->deleted_by_id = Auth::user()->id;
        $order->save();
    }

    public function deleted(Order $order)
    {
    }

    public function restoring(Order $order)
    {
        $order->deleted_by_id = null;
        $order->save();
    }

    public function restored(Order $order)
    {
    }

    public function forceDeleted(Order $order)
    {
    }
}
