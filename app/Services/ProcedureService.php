<?php

namespace App\Services;

use App\Models\Procedure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProcedureService
{
    public $table = 'procedures';

    public function add(array $data = []): Procedure
    {
        $data['code'] = Str::code('PROCEDURE', $this->table, null, 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Procedure::create($data);
    }

    public function clone(array $data, Procedure $procedure): Procedure
    {
        $data['code'] = Str::code('PROCEDURE', $this->table, null, 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Procedure::create($data);
    }

    public function edit(Procedure $procedure, $data): Procedure
    {
        $procedure->update($data);
        $procedure->refresh();

        return $procedure;
    }

    public function active(Procedure $procedure): Procedure
    {
        $procedure->is_active = ! $procedure->is_active;
        $procedure->save();
        $procedure->refresh();

        return $procedure;
    }

    public function delete(Procedure $procedure): bool
    {
        return $procedure->delete();
    }

    public function deleteAll(array $procedures = []): bool
    {
        return Procedure::when($procedures, fn ($q) => $q->whereIn('id', $procedures))->delete();
    }

    public function restore(Procedure $procedure): bool
    {
        return $procedure->restore();
    }

    public function restoreAll(array $procedures = []): bool
    {
        return Procedure::when($procedures, fn ($q) => $q->whereIn('id', $procedures))->onlyTrashed()->restore();
    }

    public function deletePermanent(Procedure $procedure): bool
    {
        return $procedure->forceDelete();
    }

    public function deletePermanentAll(array $procedures = []): bool
    {
        return Procedure::when($procedures, fn ($q) => $q->whereIn('id', $procedures))->onlyTrashed()->forceDelete();
    }
}
