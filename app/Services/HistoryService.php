<?php

namespace App\Services;

use App\Models\History;
use Illuminate\Support\Facades\DB;

class HistoryService
{
    public $table = 'histories';

    public function add(array $data = []): History
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return History::create($data);
    }

    public function clone(array $data, History $history): History
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return History::create($data);
    }

    public function edit(History $history, $data): History
    {
        $history->update($data);
        $history->refresh();

        return $history;
    }

    public function active(History $history): History
    {
        $history->is_active = ! $history->is_active;
        $history->save();
        $history->refresh();

        return $history;
    }

    public function delete(History $history): bool
    {
        return $history->delete();
    }

    public function deleteAll(array $histories = []): bool
    {
        return History::when($histories, fn ($q) => $q->whereIn('id', $histories))->delete();
    }

    public function restore(History $history): bool
    {
        return $history->restore();
    }

    public function restoreAll(array $histories = []): bool
    {
        return History::when($histories, fn ($q) => $q->whereIn('id', $histories))->onlyTrashed()->restore();
    }

    public function deletePermanent(History $history): bool
    {
        return $history->forceDelete();
    }

    public function deletePermanentAll(array $histories = []): bool
    {
        return History::when($histories, fn ($q) => $q->whereIn('id', $histories))->onlyTrashed()->forceDelete();
    }
}
