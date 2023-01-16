<?php

namespace App\Services;

use App\Models\Revision;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RevisionService
{
    public $table = 'revisions';

    public function add(array $data = []): Revision
    {
        $data['code'] = Str::code('REVISION', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Revision::create($data);
    }

    public function clone(array $data, Revision $revision): Revision
    {
        $data['code'] = Str::code('REVISION', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Revision::create($data);
    }

    public function edit(Revision $revision, $data): Revision
    {
        if ($revision->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('REVISION', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $revision->update($data);
        $revision->refresh();

        return $revision;
    }

    public function active(Revision $revision): Revision
    {
        $revision->is_active = ! $revision->is_active;
        $revision->save();
        $revision->refresh();

        return $revision;
    }

    public function delete(Revision $revision): bool
    {
        return $revision->delete();
    }

    public function deleteAll(array $revisions = []): bool
    {
        return Revision::when($revisions, fn ($q) => $q->whereIn('id', $revisions))->delete();
    }

    public function restore(Revision $revision): bool
    {
        return $revision->restore();
    }

    public function restoreAll(array $revisions = []): bool
    {
        return Revision::when($revisions, fn ($q) => $q->whereIn('id', $revisions))->onlyTrashed()->restore();
    }

    public function deletePermanent(Revision $revision): bool
    {
        return $revision->forceDelete();
    }

    public function deletePermanentAll(array $revisions = []): bool
    {
        return Revision::when($revisions, fn ($q) => $q->whereIn('id', $revisions))->onlyTrashed()->forceDelete();
    }
}
