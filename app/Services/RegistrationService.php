<?php

namespace App\Services;

use App\Models\Registration;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    public $table = 'registrations';

    public $slug = 'registration';

    public function add(array $data = []): Registration
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Registration::create($data);
    }

    public function clone(array $data, Registration $registration): Registration
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Registration::create($data);
    }

    public function edit(Registration $registration, $data): Registration
    {
        $registration->update($data);
        $registration->refresh();

        return $registration;
    }

    public function active(Registration $registration): Registration
    {
        $registration->is_active = ! $registration->is_active;
        $registration->save();
        $registration->refresh();

        return $registration;
    }

    public function delete(Registration $registration): bool
    {
        return $registration->delete();
    }

    public function deleteAll(array $registrations = []): bool
    {
        return Registration::when($registrations, fn ($q) => $q->whereIn('id', $registrations))->delete();
    }

    public function restore(Registration $registration): bool
    {
        return $registration->restore();
    }

    public function restoreAll(array $registrations = []): bool
    {
        return Registration::when($registrations, fn ($q) => $q->whereIn('id', $registrations))->onlyTrashed()->restore();
    }

    public function deletePermanent(Registration $registration): bool
    {
        return $registration->forceDelete();
    }

    public function deletePermanentAll(array $registrations = []): bool
    {
        return Registration::when($registrations, fn ($q) => $q->whereIn('id', $registrations))->onlyTrashed()->forceDelete();
    }
}
