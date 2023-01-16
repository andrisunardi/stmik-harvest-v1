<?php

namespace App\Services;

use App\Models\Career;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CareerService
{
    public $table = 'careers';

    public function add(array $data = []): Career
    {
        $data['code'] = Str::code('CAREER', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Career::create($data);
    }

    public function clone(array $data, Career $career): Career
    {
        $data['code'] = Str::code('CAREER', $this->table, null, 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Career::create($data);
    }

    public function edit(Career $career, $data): Career
    {
        $career->update($data);
        $career->refresh();

        return $career;
    }

    public function active(Career $career): Career
    {
        $career->is_active = ! $career->is_active;
        $career->save();
        $career->refresh();

        return $career;
    }

    public function delete(Career $career): bool
    {
        return $career->delete();
    }

    public function deleteAll(array $careers = []): bool
    {
        return Career::when($careers, fn ($q) => $q->whereIn('id', $careers))->delete();
    }

    public function restore(Career $career): bool
    {
        return $career->restore();
    }

    public function restoreAll(array $careers = []): bool
    {
        return Career::when($careers, fn ($q) => $q->whereIn('id', $careers))->onlyTrashed()->restore();
    }

    public function deletePermanent(Career $career): bool
    {
        return $career->forceDelete();
    }

    public function deletePermanentAll(array $careers = []): bool
    {
        return Career::when($careers, fn ($q) => $q->whereIn('id', $careers))->onlyTrashed()->forceDelete();
    }
}
