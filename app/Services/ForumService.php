<?php

namespace App\Services;

use App\Models\Forum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForumService
{
    public $table = 'forums';

    public function add(array $data = []): Forum
    {
        $data['code'] = Str::code('FORUM', $this->table, now()->format('Y-m-d'), 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Forum::create($data);
    }

    public function clone(array $data, Forum $forum): Forum
    {
        $data['code'] = Str::code('FORUM', $this->table, now()->format('Y-m-d'), 4);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Forum::create($data);
    }

    public function edit(Forum $forum, $data): Forum
    {
        $forum->update($data);
        $forum->refresh();

        return $forum;
    }

    public function active(Forum $forum): Forum
    {
        $forum->is_active = ! $forum->is_active;
        $forum->save();
        $forum->refresh();

        return $forum;
    }

    public function delete(Forum $forum): bool
    {
        return $forum->delete();
    }

    public function deleteAll(array $forums = []): bool
    {
        return Forum::when($forums, fn ($q) => $q->whereIn('id', $forums))->delete();
    }

    public function restore(Forum $forum): bool
    {
        return $forum->restore();
    }

    public function restoreAll(array $forums = []): bool
    {
        return Forum::when($forums, fn ($q) => $q->whereIn('id', $forums))->onlyTrashed()->restore();
    }

    public function deletePermanent(Forum $forum): bool
    {
        return $forum->forceDelete();
    }

    public function deletePermanentAll(array $forums = []): bool
    {
        return Forum::when($forums, fn ($q) => $q->whereIn('id', $forums))->onlyTrashed()->forceDelete();
    }
}
