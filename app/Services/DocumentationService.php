<?php

namespace App\Services;

use App\Models\Documentation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DocumentationService
{
    public $table = 'documentations';

    public $slug = 'documentation';

    public function add(array $data = []): Documentation
    {
        $data['code'] = Str::code('DOCUMENTATION', $this->table, null, 4);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        $video = $data['video'];

        if ($video) {
            $data['video'] = "{$data['code']}.{$video->getClientOriginalExtension()}";
            $video->storePubliclyAs($this->slug, $data['video'], 'videos');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Documentation::create($data);
    }

    public function clone(array $data, Documentation $documentation): Documentation
    {
        $data['code'] = Str::code('DOCUMENTATION', $this->table, null, 4);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($documentation->checkFile()) {
                $data['image'] = "{$data['code']}.".explode('.', $documentation->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$documentation->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        $video = $data['video'];

        if ($video) {
            $data['video'] = "{$data['code']}.{$video->getClientOriginalExtension()}";
            $video->storePubliclyAs($this->slug, $data['video'], 'videos');
        } else {
            if ($documentation->checkFile()) {
                $data['video'] = "{$data['code']}.".explode('.', $documentation->video)[1];

                File::copy(
                    public_path("videos/{$this->slug}/{$documentation->video}"),
                    public_path("videos/{$this->slug}/{$data['video']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Documentation::create($data);
    }

    public function edit(Documentation $documentation, $data): Documentation
    {
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $documentation->deleteFile();

            $data['image'] = "{$documentation->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $video = $data['video'];

        if ($video) {
            $documentation->deleteFile();

            $data['video'] = "{$documentation->code}.{$video->getClientOriginalExtension()}";
            $video->storePubliclyAs($this->slug, $data['video'], 'videos');
        } else {
            unset($data['video']);
        }

        $documentation->update($data);
        $documentation->refresh();

        return $documentation;
    }

    public function active(Documentation $documentation): Documentation
    {
        $documentation->is_active = ! $documentation->is_active;
        $documentation->save();
        $documentation->refresh();

        return $documentation;
    }

    public function delete(Documentation $documentation): bool
    {
        return $documentation->delete();
    }

    public function deleteAll(array $documentations = []): bool
    {
        return Documentation::when($documentations, fn ($q) => $q->whereIn('id', $documentations))->delete();
    }

    public function restore(Documentation $documentation): bool
    {
        return $documentation->restore();
    }

    public function restoreAll(array $documentations = []): bool
    {
        return Documentation::when($documentations, fn ($q) => $q->whereIn('id', $documentations))->onlyTrashed()->restore();
    }

    public function deletePermanent(Documentation $documentation): bool
    {
        $documentation->deleteImage();
        $documentation->deleteVideo();

        return $documentation->forceDelete();
    }

    public function deletePermanentAll(array $documentations = []): bool
    {
        $documentations = Documentation::when($documentations, fn ($q) => $q->whereIn('id', $documentations))->onlyTrashed()->get();

        foreach ($documentations as $documentation) {
            $documentation->deleteImage();
            $documentation->deleteVideo();
            $documentation->forceDelete();
        }

        return true;
    }
}
