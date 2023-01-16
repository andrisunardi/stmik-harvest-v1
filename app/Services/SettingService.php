<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingService
{
    public $table = 'settings';

    public function add(array $data = []): Setting
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Setting::create($data);
    }

    public function clone(array $data, Setting $setting): Setting
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Setting::create($data);
    }

    public function edit(Setting $setting, $data): Setting
    {
        $setting->update($data);
        $setting->refresh();

        return $setting;
    }

    public function active(Setting $setting): Setting
    {
        $setting->is_active = ! $setting->is_active;
        $setting->save();
        $setting->refresh();

        return $setting;
    }

    public function delete(Setting $setting): bool
    {
        return $setting->delete();
    }

    public function deleteAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->delete();
    }

    public function restore(Setting $setting): bool
    {
        return $setting->restore();
    }

    public function restoreAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->onlyTrashed()->restore();
    }

    public function deletePermanent(Setting $setting): bool
    {
        return $setting->forceDelete();
    }

    public function deletePermanentAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->onlyTrashed()->forceDelete();
    }
}
