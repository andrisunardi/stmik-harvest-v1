<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductCategoryObserver
{
    public function creating(ProductCategory $productCategory)
    {
        $productCategory->created_by_id = Auth::user()->id;
        $productCategory->updated_by_id = Auth::user()->id;
    }

    public function created(ProductCategory $productCategory)
    {
    }

    public function updating(ProductCategory $productCategory)
    {
        $productCategory->updated_by_id = Auth::user()->id;
    }

    public function updated(ProductCategory $productCategory)
    {
    }

    public function deleting(ProductCategory $productCategory)
    {
        $productCategory->deleted_by_id = Auth::user()->id;
        $productCategory->save();
    }

    public function deleted(ProductCategory $productCategory)
    {
    }

    public function restoring(ProductCategory $productCategory)
    {
        $productCategory->deleted_by_id = null;
        $productCategory->save();
    }

    public function restored(ProductCategory $productCategory)
    {
    }

    public function forceDeleted(ProductCategory $productCategory)
    {
    }
}
