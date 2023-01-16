<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationService
{
    public $table = 'notifications';

    public function add(array $data = []): Notification
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Notification::create($data);
    }

    public function clone(array $data, Notification $notification): Notification
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Notification::create($data);
    }

    public function edit(Notification $notification, $data): Notification
    {
        $notification->update($data);
        $notification->refresh();

        return $notification;
    }

    public function active(Notification $notification): Notification
    {
        $notification->is_active = ! $notification->is_active;
        $notification->save();
        $notification->refresh();

        return $notification;
    }

    public function delete(Notification $notification): bool
    {
        return $notification->delete();
    }

    public function deleteAll(array $notifications = []): bool
    {
        return Notification::when($notifications, fn ($q) => $q->whereIn('id', $notifications))->delete();
    }

    public function restore(Notification $notification): bool
    {
        return $notification->restore();
    }

    public function restoreAll(array $notifications = []): bool
    {
        return Notification::when($notifications, fn ($q) => $q->whereIn('id', $notifications))->onlyTrashed()->restore();
    }

    public function deletePermanent(Notification $notification): bool
    {
        return $notification->forceDelete();
    }

    public function deletePermanentAll(array $notifications = []): bool
    {
        return Notification::when($notifications, fn ($q) => $q->whereIn('id', $notifications))->onlyTrashed()->forceDelete();
    }
}
