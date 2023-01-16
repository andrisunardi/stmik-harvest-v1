<?php

namespace App\Services;

use App\Models\Sponsor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SponsorService
{
    public $table = 'sponsors';

    public function add(array $data = []): Sponsor
    {
        $data['code'] = Str::code('SPONSOR', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Sponsor::create($data);
    }

    public function clone(array $data, Sponsor $sponsor): Sponsor
    {
        $data['code'] = Str::code('SPONSOR', $this->table, null, 3);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Sponsor::create($data);
    }

    public function edit(Sponsor $sponsor, $data): Sponsor
    {
        $sponsor->update($data);
        $sponsor->refresh();

        return $sponsor;
    }

    public function active(Sponsor $sponsor): Sponsor
    {
        $sponsor->is_active = ! $sponsor->is_active;
        $sponsor->save();
        $sponsor->refresh();

        return $sponsor;
    }

    public function delete(Sponsor $sponsor): bool
    {
        return $sponsor->delete();
    }

    public function deleteAll(array $sponsors = []): bool
    {
        return Sponsor::when($sponsors, fn ($q) => $q->whereIn('id', $sponsors))->delete();
    }

    public function restore(Sponsor $sponsor): bool
    {
        return $sponsor->restore();
    }

    public function restoreAll(array $sponsors = []): bool
    {
        return Sponsor::when($sponsors, fn ($q) => $q->whereIn('id', $sponsors))->onlyTrashed()->restore();
    }

    public function deletePermanent(Sponsor $sponsor): bool
    {
        return $sponsor->forceDelete();
    }

    public function deletePermanentAll(array $sponsors = []): bool
    {
        return Sponsor::when($sponsors, fn ($q) => $q->whereIn('id', $sponsors))->onlyTrashed()->forceDelete();
    }
}
