<?php

namespace App\Services;

use App\Models\Framework;
use Illuminate\Support\Facades\DB;

class FrameworkService
{
    public $table = 'frameworks';

    public function add(array $data = []): Framework
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Framework::create($data);
    }

    public function clone(array $data, Framework $framework): Framework
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Framework::create($data);
    }

    public function edit(Framework $framework, $data): Framework
    {
        $framework->update($data);
        $framework->refresh();

        return $framework;
    }

    public function active(Framework $framework): Framework
    {
        $framework->is_active = ! $framework->is_active;
        $framework->save();
        $framework->refresh();

        return $framework;
    }

    public function delete(Framework $framework): bool
    {
        return $framework->delete();
    }

    public function deleteAll(array $frameworks = []): bool
    {
        return Framework::when($frameworks, fn ($q) => $q->whereIn('id', $frameworks))->delete();
    }

    public function restore(Framework $framework): bool
    {
        return $framework->restore();
    }

    public function restoreAll(array $frameworks = []): bool
    {
        return Framework::when($frameworks, fn ($q) => $q->whereIn('id', $frameworks))->onlyTrashed()->restore();
    }

    public function deletePermanent(Framework $framework): bool
    {
        return $framework->forceDelete();
    }

    public function deletePermanentAll(array $frameworks = []): bool
    {
        return Framework::when($frameworks, fn ($q) => $q->whereIn('id', $frameworks))->onlyTrashed()->forceDelete();
    }
}
