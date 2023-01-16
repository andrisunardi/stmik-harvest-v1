<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->created_by_id = Auth::user()->id;
        $product->updated_by_id = Auth::user()->id;
    }

    public function created(Product $product)
    {
    }

    public function updating(Product $product)
    {
        $product->updated_by_id = Auth::user()->id;
    }

    public function updated(Product $product)
    {
    }

    public function deleting(Product $product)
    {
        $product->deleted_by_id = Auth::user()->id;
        $product->save();
    }

    public function deleted(Product $product)
    {
    }

    public function restoring(Product $product)
    {
        $product->deleted_by_id = null;
        $product->save();
    }

    public function restored(Product $product)
    {
    }

    public function forceDeleted(Product $product)
    {
    }
}
