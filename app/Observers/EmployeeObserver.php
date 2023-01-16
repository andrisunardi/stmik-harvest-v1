<?php

namespace App\Observers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeObserver
{
    public function creating(Employee $employee)
    {
        $employee->created_by_id = Auth::user()->id;
        $employee->updated_by_id = Auth::user()->id;
    }

    public function created(Employee $employee)
    {
    }

    public function updating(Employee $employee)
    {
        $employee->updated_by_id = Auth::user()->id;
    }

    public function updated(Employee $employee)
    {
    }

    public function deleting(Employee $employee)
    {
        $employee->deleted_by_id = Auth::user()->id;
        $employee->save();
    }

    public function deleted(Employee $employee)
    {
    }

    public function restoring(Employee $employee)
    {
        $employee->deleted_by_id = null;
        $employee->save();
    }

    public function restored(Employee $employee)
    {
    }

    public function forceDeleted(Employee $employee)
    {
    }
}
