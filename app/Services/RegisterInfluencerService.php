<?php

namespace App\Services;

use App\Models\RegisterInfluencer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterInfluencerService
{
    public $table = 'influencer_registers';

    public function add(array $data = []): RegisterInfluencer
    {
        $data['code'] = Str::code('REGINF', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return RegisterInfluencer::create($data);
    }

    public function clone(array $data, RegisterInfluencer $registerInfluencer): RegisterInfluencer
    {
        $data['code'] = Str::code('REGINF', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return RegisterInfluencer::create($data);
    }

    public function edit(RegisterInfluencer $registerInfluencer, $data): RegisterInfluencer
    {
        if ($registerInfluencer->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('REGINF', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $registerInfluencer->update($data);
        $registerInfluencer->refresh();

        return $registerInfluencer;
    }

    public function active(RegisterInfluencer $registerInfluencer): RegisterInfluencer
    {
        $registerInfluencer->is_active = ! $registerInfluencer->is_active;
        $registerInfluencer->save();
        $registerInfluencer->refresh();

        return $registerInfluencer;
    }

    public function delete(RegisterInfluencer $registerInfluencer): bool
    {
        return $registerInfluencer->delete();
    }

    public function deleteAll(array $registerInfluencers = []): bool
    {
        return RegisterInfluencer::when($registerInfluencers, fn ($q) => $q->whereIn('id', $registerInfluencers))->delete();
    }

    public function restore(RegisterInfluencer $registerInfluencer): bool
    {
        return $registerInfluencer->restore();
    }

    public function restoreAll(array $registerInfluencers = []): bool
    {
        return RegisterInfluencer::when($registerInfluencers, fn ($q) => $q->whereIn('id', $registerInfluencers))->onlyTrashed()->restore();
    }

    public function deletePermanent(RegisterInfluencer $registerInfluencer): bool
    {
        return $registerInfluencer->forceDelete();
    }

    public function deletePermanentAll(array $registerInfluencers = []): bool
    {
        return RegisterInfluencer::when($registerInfluencers, fn ($q) => $q->whereIn('id', $registerInfluencers))->onlyTrashed()->forceDelete();
    }
}
