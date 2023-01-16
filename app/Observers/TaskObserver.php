<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskObserver
{
    public function creating(Task $task)
    {
        $task->created_by_id = Auth::user()->id;
        $task->updated_by_id = Auth::user()->id;
    }

    public function created(Task $task)
    {
    }

    public function updating(Task $task)
    {
        $task->updated_by_id = Auth::user()->id;
    }

    public function updated(Task $task)
    {
    }

    public function deleting(Task $task)
    {
        $task->deleted_by_id = Auth::user()->id;
        $task->save();
    }

    public function deleted(Task $task)
    {
    }

    public function restoring(Task $task)
    {
        $task->deleted_by_id = null;
        $task->save();
    }

    public function restored(Task $task)
    {
    }

    public function forceDeleted(Task $task)
    {
    }
}
