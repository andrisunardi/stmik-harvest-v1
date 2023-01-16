<?php

namespace App\Observers;

use App\Models\Salary;
use Illuminate\Support\Facades\Auth;

class SalaryObserver
{
    public function creating(Salary $salary)
    {
        $salary->created_by_id = Auth::user()->id;
        $salary->updated_by_id = Auth::user()->id;
    }

    public function created(Salary $salary)
    {
    }

    public function updating(Salary $salary)
    {
        $salary->updated_by_id = Auth::user()->id;
    }

    public function updated(Salary $salary)
    {
    }

    public function deleting(Salary $salary)
    {
        $salary->deleted_by_id = Auth::user()->id;
        $salary->save();
    }

    public function deleted(Salary $salary)
    {
    }

    public function restoring(Salary $salary)
    {
        $salary->deleted_by_id = null;
        $salary->save();
    }

    public function restored(Salary $salary)
    {
    }

    public function forceDeleted(Salary $salary)
    {
    }
}
