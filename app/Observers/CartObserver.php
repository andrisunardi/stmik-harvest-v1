<?php

namespace App\Observers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartObserver
{
    public function creating(Cart $cart)
    {
        $cart->created_by_id = Auth::user()->id;
        $cart->updated_by_id = Auth::user()->id;
    }

    public function created(Cart $cart)
    {
    }

    public function updating(Cart $cart)
    {
        $cart->updated_by_id = Auth::user()->id;
    }

    public function updated(Cart $cart)
    {
    }

    public function deleting(Cart $cart)
    {
        $cart->deleted_by_id = Auth::user()->id;
        $cart->save();
    }

    public function deleted(Cart $cart)
    {
    }

    public function restoring(Cart $cart)
    {
        $cart->deleted_by_id = null;
        $cart->save();
    }

    public function restored(Cart $cart)
    {
    }

    public function forceDeleted(Cart $cart)
    {
    }
}
