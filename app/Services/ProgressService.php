<?php

namespace App\Services;

use App\Models\Progress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgressService
{
    public $table = 'progresses';

    public function add(array $data = []): Progress
    {
        $data['code'] = Str::code('PROGRESS', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Progress::create($data);
    }

    public function clone(array $data, Progress $progress): Progress
    {
        $data['code'] = Str::code('PROGRESS', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Progress::create($data);
    }

    public function edit(Progress $progress, $data): Progress
    {
        if ($progress->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('PROGRESS', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $progress->update($data);
        $progress->refresh();

        return $progress;
    }

    public function active(Progress $progress): Progress
    {
        $progress->is_active = ! $progress->is_active;
        $progress->save();
        $progress->refresh();

        return $progress;
    }

    public function delete(Progress $progress): bool
    {
        return $progress->delete();
    }

    public function deleteAll(array $progresss = []): bool
    {
        return Progress::when($progresss, fn ($q) => $q->whereIn('id', $progresss))->delete();
    }

    public function restore(Progress $progress): bool
    {
        return $progress->restore();
    }

    public function restoreAll(array $progresss = []): bool
    {
        return Progress::when($progresss, fn ($q) => $q->whereIn('id', $progresss))->onlyTrashed()->restore();
    }

    public function deletePermanent(Progress $progress): bool
    {
        return $progress->forceDelete();
    }

    public function deletePermanentAll(array $progresss = []): bool
    {
        return Progress::when($progresss, fn ($q) => $q->whereIn('id', $progresss))->onlyTrashed()->forceDelete();
    }
}
