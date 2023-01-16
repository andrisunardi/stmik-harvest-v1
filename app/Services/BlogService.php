<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogService
{
    public $table = 'blogs';

    public function add(array $data = []): Blog
    {
        $data['code'] = Str::code('BLOG', $this->table, now()->format('Y-m-d'), 5);
        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Blog::create($data);
    }

    public function clone(array $data, Blog $blog): Blog
    {
        $data['code'] = Str::code('BLOG', $this->table, now()->format('Y-m-d'), 5);
        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Blog::create($data);
    }

    public function edit(Blog $blog, $data): Blog
    {
        $data['slug'] = Str::slug($data['title']);

        $blog->update($data);
        $blog->refresh();

        return $blog;
    }

    public function active(Blog $blog): Blog
    {
        $blog->is_active = ! $blog->is_active;
        $blog->save();
        $blog->refresh();

        return $blog;
    }

    public function delete(Blog $blog): bool
    {
        return $blog->delete();
    }

    public function deleteAll(array $blogs = []): bool
    {
        return Blog::when($blogs, fn ($q) => $q->whereIn('id', $blogs))->delete();
    }

    public function restore(Blog $blog): bool
    {
        return $blog->restore();
    }

    public function restoreAll(array $blogs = []): bool
    {
        return Blog::when($blogs, fn ($q) => $q->whereIn('id', $blogs))->onlyTrashed()->restore();
    }

    public function deletePermanent(Blog $blog): bool
    {
        return $blog->forceDelete();
    }

    public function deletePermanentAll(array $blogs = []): bool
    {
        return Blog::when($blogs, fn ($q) => $q->whereIn('id', $blogs))->onlyTrashed()->forceDelete();
    }
}
