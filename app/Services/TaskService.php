<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskService
{
    public $table = 'tasks';

    public function add(array $data = []): Task
    {
        $data['code'] = Str::code('TASK', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Task::create($data);
    }

    public function clone(array $data, Task $task): Task
    {
        $data['code'] = Str::code('TASK', $this->table, now()->format('Y-m-d'), 2);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Task::create($data);
    }

    public function edit(Task $task, $data): Task
    {
        $task->update($data);
        $task->refresh();

        return $task;
    }

    public function active(Task $task): Task
    {
        $task->is_active = ! $task->is_active;
        $task->save();
        $task->refresh();

        return $task;
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }

    public function deleteAll(array $tasks = []): bool
    {
        return Task::when($tasks, fn ($q) => $q->whereIn('id', $tasks))->delete();
    }

    public function restore(Task $task): bool
    {
        return $task->restore();
    }

    public function restoreAll(array $tasks = []): bool
    {
        return Task::when($tasks, fn ($q) => $q->whereIn('id', $tasks))->onlyTrashed()->restore();
    }

    public function deletePermanent(Task $task): bool
    {
        return $task->forceDelete();
    }

    public function deletePermanentAll(array $tasks = []): bool
    {
        return Task::when($tasks, fn ($q) => $q->whereIn('id', $tasks))->onlyTrashed()->forceDelete();
    }
}
