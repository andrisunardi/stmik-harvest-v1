<?php

namespace App\Services;

use App\Models\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RuleService
{
    public $table = 'rules';

    public function add(array $data = []): Rule
    {
        $data['code'] = Str::code('RL', $this->table, null, 8);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Rule::create($data);
    }

    public function clone(array $data, Rule $rule): Rule
    {
        $data['code'] = Str::code('RL', $this->table, null, 8);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Rule::create($data);
    }

    public function edit(Rule $rule, $data): Rule
    {
        $rule->update($data);
        $rule->refresh();

        return $rule;
    }

    public function active(Rule $rule): Rule
    {
        $rule->is_active = ! $rule->is_active;
        $rule->save();
        $rule->refresh();

        return $rule;
    }

    public function delete(Rule $rule): bool
    {
        return $rule->delete();
    }

    public function deleteAll(array $rules = []): bool
    {
        return Rule::when($rules, fn ($q) => $q->whereIn('id', $rules))->delete();
    }

    public function restore(Rule $rule): bool
    {
        return $rule->restore();
    }

    public function restoreAll(array $rules = []): bool
    {
        return Rule::when($rules, fn ($q) => $q->whereIn('id', $rules))->onlyTrashed()->restore();
    }

    public function deletePermanent(Rule $rule): bool
    {
        return $rule->forceDelete();
    }

    public function deletePermanentAll(array $rules = []): bool
    {
        return Rule::when($rules, fn ($q) => $q->whereIn('id', $rules))->onlyTrashed()->forceDelete();
    }
}
