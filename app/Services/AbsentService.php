<?php

namespace App\Services;

use App\Models\Absent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsentService
{
    public $table = 'absents';

    public function add(array $data = []): Absent
    {
        $data['code'] = Str::code('ABSENT', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return Absent::create($data);
    }

    public function clone(array $data, Absent $absent): Absent
    {
        $data['code'] = Str::code('ABSENT', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        if (env('APP_ENV') != 'testing') {
            DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));
        }

        return Absent::create($data);
    }

    public function edit(Absent $absent, array $data = []): Absent
    {
        if ($absent->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('ABSENT', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $absent->update($data);
        $absent->refresh();

        return $absent;
    }

    public function active(Absent $absent): Absent
    {
        $absent->is_active = ! $absent->is_active;
        $absent->save();
        $absent->refresh();

        return $absent;
    }

    public function delete(Absent $absent): bool
    {
        return $absent->delete();
    }

    public function deleteAll(array $absents = []): bool
    {
        return Absent::when($absents, fn ($q) => $q->whereIn('id', $absents))->delete();
    }

    public function restore(Absent $absent): bool
    {
        return $absent->restore();
    }

    public function restoreAll(array $absents = []): bool
    {
        return Absent::when($absents, fn ($q) => $q->whereIn('id', $absents))->onlyTrashed()->restore();
    }

    public function deletePermanent(Absent $absent): bool
    {
        return $absent->forceDelete();
    }

    public function deletePermanentAll(array $absents = []): bool
    {
        return Absent::when($absents, fn ($q) => $q->whereIn('id', $absents))->onlyTrashed()->forceDelete();
    }
}
