<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogService
{
    public $table = 'blogs';

    public $slug = 'blog';

    public function add(array $data = []): Blog
    {
        $image = $data['image'];
        $imageName = Str::slug($data['title']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Blog::create($data);
    }

    public function clone(array $data, Blog $blog): Blog
    {
        $image = $data['image'];
        $imageName = Str::slug($data['title']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($blog->checkImage()) {
                $data['image'] = "{$imageName}.".File::extension($blog->image);

                File::copy(
                    public_path("images/{$this->slug}/{$blog->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Blog::create($data);
    }

    public function edit(Blog $blog, $data): Blog
    {
        $image = $data['image'];
        $imageName = Str::slug($data['title']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $blog->deleteImage();

            $data['image'] = "{$imageName}.{$image->extension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

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

    public function deleteImage(Blog $blog)
    {
        $blog->deleteImage();

        $blog->image = null;
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
        $blog->deleteImage();

        return $blog->forceDelete();
    }

    public function deletePermanentAll(array $blogs = []): bool
    {
        $blogs = Blog::when($blogs, fn ($q) => $q->whereIn('id', $blogs))->onlyTrashed()->get();

        foreach ($blogs as $blog) {
            $blog->deleteImage();
            $blog->forceDelete();
        }

        return true;
    }
}
