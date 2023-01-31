<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EventService
{
    public $table = 'events';

    public $slug = 'event';

    public function add(array $data = []): Event
    {
        $image = $data['image'];
        $imageName = Str::slug($data['title']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Event::create($data);
    }

    public function clone(array $data, Event $event): Event
    {
        $image = $data['image'];
        $imageName = Str::slug($data['title']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($event->checkImage()) {
                $data['image'] = "{$imageName}.".explode('.', $event->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$event->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        $data['slug'] = Str::slug($data['title']);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Event::create($data);
    }

    public function edit(Event $event, $data): Event
    {
        $image = $data['image'];
        $imageName = Str::slug($data['title']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $event->deleteImage();

            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $data['slug'] = Str::slug($data['title']);

        $event->update($data);
        $event->refresh();

        return $event;
    }

    public function active(Event $event): Event
    {
        $event->is_active = ! $event->is_active;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }

    public function deleteAll(array $events = []): bool
    {
        return Event::when($events, fn ($q) => $q->whereIn('id', $events))->delete();
    }

    public function restore(Event $event): bool
    {
        return $event->restore();
    }

    public function restoreAll(array $events = []): bool
    {
        return Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->restore();
    }

    public function deletePermanent(Event $event): bool
    {
        $event->deleteImage();

        return $event->forceDelete();
    }

    public function deletePermanentAll(array $events = []): bool
    {
        $events = Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->get();

        foreach ($events as $event) {
            $event->deleteImage();
            $event->forceDelete();
        }

        return true;
    }
}
