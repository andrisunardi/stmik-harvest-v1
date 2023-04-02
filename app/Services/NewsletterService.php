<?php

namespace App\Services;

use App\Models\Newsletter;
use Illuminate\Support\Facades\DB;

class NewsletterService
{
    public $table = 'newsletters';

    public $slug = 'newsletter';

    public function add(array $data = []): Newsletter
    {
        $data['type'] = $data['type'] ?: null;

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Newsletter::create($data);
    }

    public function clone(array $data, Newsletter $newsletter): Newsletter
    {
        $data['type'] = $data['type'] ?: null;

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Newsletter::create($data);
    }

    public function edit(Newsletter $newsletter, $data): Newsletter
    {
        $data['type'] = $data['type'] ?: null;

        $newsletter->update($data);
        $newsletter->refresh();

        return $newsletter;
    }

    public function active(Newsletter $newsletter): Newsletter
    {
        $newsletter->is_active = ! $newsletter->is_active;
        $newsletter->save();
        $newsletter->refresh();

        return $newsletter;
    }

    public function delete(Newsletter $newsletter): bool
    {
        return $newsletter->delete();
    }

    public function deleteAll(array $newsletters = []): bool
    {
        return Newsletter::when($newsletters, fn ($q) => $q->whereIn('id', $newsletters))->delete();
    }

    public function restore(Newsletter $newsletter): bool
    {
        return $newsletter->restore();
    }

    public function restoreAll(array $newsletters = []): bool
    {
        return Newsletter::when($newsletters, fn ($q) => $q->whereIn('id', $newsletters))->onlyTrashed()->restore();
    }

    public function deletePermanent(Newsletter $newsletter): bool
    {
        return $newsletter->forceDelete();
    }

    public function deletePermanentAll(array $newsletters = []): bool
    {
        return Newsletter::when($newsletters, fn ($q) => $q->whereIn('id', $newsletters))->onlyTrashed()->forceDelete();
    }
}
