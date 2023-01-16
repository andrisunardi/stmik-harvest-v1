<?php

namespace App\Services;

use App\Models\Assignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssignmentService
{
    public $table = 'assignments';

    public function add(array $data = []): Assignment
    {
        $data['code'] = Str::code('ASSIGNMENT', $this->table, now()->format('Y-m-d'), 1);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Assignment::create($data);
    }

    public function clone(array $data, Assignment $assignmentt): Assignment
    {
        $data['code'] = Str::code('ASSIGNMENT', $this->table, now()->format('Y-m-d'), 1);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Assignment::create($data);
    }

    public function edit(Assignment $assignment, $data): Assignment
    {
        $assignment->update($data);
        $assignment->refresh();

        return $assignment;
    }

    public function active(Assignemnt $assignment): Assignemnt
    {
        $assignment->is_active = ! $assignment->is_active;
        $assignment->save();
        $assignment->refresh();

        return $assignment;
    }

    public function delete(Assignemnt $assignment): bool
    {
        return $assignment->delete();
    }

    public function deleteAll(array $assignments = []): bool
    {
        return Assignemnt::when($assignments, fn ($q) => $q->whereIn('id', $assignments))->delete();
    }

    public function restore(Assignemnt $assignment): bool
    {
        return $assignment->restore();
    }

    public function restoreAll(array $assignments = []): bool
    {
        return Assignemnt::when($assignments, fn ($q) => $q->whereIn('id', $assignments))->onlyTrashed()->restore();
    }

    public function deletePermanent(Assignemnt $assignment): bool
    {
        return $assignment->forceDelete();
    }

    public function deletePermanentAll(array $assignments = []): bool
    {
        return Assignemnt::when($assignments, fn ($q) => $q->whereIn('id', $assignments))->onlyTrashed()->forceDelete();
    }
}
