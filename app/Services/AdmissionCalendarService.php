<?php

namespace App\Services;

use App\Models\AdmissionCalendar;
use Illuminate\Support\Facades\DB;

class AdmissionCalendarService
{
    public $table = 'admission_calendars';

    public $slug = 'admission-calendar';

    public function add(array $data = []): AdmissionCalendar
    {
        $data['date'] = $data['date'] ?: null;

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return AdmissionCalendar::create($data);
    }

    public function clone(array $data, AdmissionCalendar $admissionCalendar): AdmissionCalendar
    {
        $data['date'] = $data['date'] ?: null;

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return AdmissionCalendar::create($data);
    }

    public function edit(AdmissionCalendar $admissionCalendar, $data): AdmissionCalendar
    {
        $data['date'] = $data['date'] ?: null;

        $admissionCalendar->update($data);
        $admissionCalendar->refresh();

        return $admissionCalendar;
    }

    public function active(AdmissionCalendar $admissionCalendar): AdmissionCalendar
    {
        $admissionCalendar->is_active = ! $admissionCalendar->is_active;
        $admissionCalendar->save();
        $admissionCalendar->refresh();

        return $admissionCalendar;
    }

    public function delete(AdmissionCalendar $admissionCalendar): bool
    {
        return $admissionCalendar->delete();
    }

    public function deleteAll(array $admissionCalendars = []): bool
    {
        return AdmissionCalendar::when($admissionCalendars, fn ($q) => $q->whereIn('id', $admissionCalendars))->delete();
    }

    public function restore(AdmissionCalendar $admissionCalendar): bool
    {
        return $admissionCalendar->restore();
    }

    public function restoreAll(array $admissionCalendars = []): bool
    {
        return AdmissionCalendar::when($admissionCalendars, fn ($q) => $q->whereIn('id', $admissionCalendars))->onlyTrashed()->restore();
    }

    public function deletePermanent(AdmissionCalendar $admissionCalendar): bool
    {
        return $admissionCalendar->forceDelete();
    }

    public function deletePermanentAll(array $admissionCalendars = []): bool
    {
        return AdmissionCalendar::when($admissionCalendars, fn ($q) => $q->whereIn('id', $admissionCalendars))->onlyTrashed()->forceDelete();
    }
}
