<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsService
{
    public $table = 'news';

    public function add(array $data = []): News
    {
        $data['code'] = Str::code('NEWS', $this->table, now()->format('Y-m-d'), 2);
        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return News::create($data);
    }

    public function clone(array $data, News $news): News
    {
        $data['code'] = Str::code('NEWS', $this->table, now()->format('Y-m-d'), 2);
        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return News::create($data);
    }

    public function edit(News $news, $data): News
    {
        $data['slug'] = Str::slug($data['title']);

        $news->update($data);
        $news->refresh();

        return $news;
    }

    public function active(News $news): News
    {
        $news->is_active = ! $news->is_active;
        $news->save();
        $news->refresh();

        return $news;
    }

    public function delete(News $news): bool
    {
        return $news->delete();
    }

    public function deleteAll(array $newss = []): bool
    {
        return News::when($newss, fn ($q) => $q->whereIn('id', $newss))->delete();
    }

    public function restore(News $news): bool
    {
        return $news->restore();
    }

    public function restoreAll(array $newss = []): bool
    {
        return News::when($newss, fn ($q) => $q->whereIn('id', $newss))->onlyTrashed()->restore();
    }

    public function deletePermanent(News $news): bool
    {
        return $news->forceDelete();
    }

    public function deletePermanentAll(array $newss = []): bool
    {
        return News::when($newss, fn ($q) => $q->whereIn('id', $newss))->onlyTrashed()->forceDelete();
    }
}
