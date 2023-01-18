<?php

namespace App\Services;

use App\Models\Value;
use Illuminate\Support\Facades\DB;

class ValueService
{
    public $table = 'values';

    public $slug = 'value';

    public function add(array $data = []): Value
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Value::create($data);
    }

    public function clone(array $data, Value $value): Value
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Value::create($data);
    }

    public function edit(Value $value, $data): Value
    {
        $value->update($data);
        $value->refresh();

        return $value;
    }

    public function active(Value $value): Value
    {
        $value->is_active = ! $value->is_active;
        $value->save();
        $value->refresh();

        return $value;
    }

    public function delete(Value $value): bool
    {
        return $value->delete();
    }

    public function deleteAll(array $values = []): bool
    {
        return Value::when($values, fn ($q) => $q->whereIn('id', $values))->delete();
    }

    public function restore(Value $value): bool
    {
        return $value->restore();
    }

    public function restoreAll(array $values = []): bool
    {
        return Value::when($values, fn ($q) => $q->whereIn('id', $values))->onlyTrashed()->restore();
    }

    public function deletePermanent(Value $value): bool
    {
        return $value->forceDelete();
    }

    public function deletePermanentAll(array $values = []): bool
    {
        return Value::when($values, fn ($q) => $q->whereIn('id', $values))->onlyTrashed()->forceDelete();
    }
}
