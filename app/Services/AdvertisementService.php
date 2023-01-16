<?php

namespace App\Services;

use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdvertisementService
{
    public $table = 'advertisements';

    public function add(array $data = []): Advertisement
    {
        $data['code'] = Str::code('ADS', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Advertisement::create($data);
    }

    public function clone(array $data, Advertisement $advertisementt): Advertisement
    {
        $data['code'] = Str::code('ADS', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Advertisement::create($data);
    }

    public function edit(Advertisement $advertisement, $data): Advertisement
    {
        if ($advertisement->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('ADS', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $advertisement->update($data);
        $advertisement->refresh();

        return $advertisement;
    }

    public function active(Advertisement $advertisement): Advertisement
    {
        $advertisement->is_active = ! $advertisement->is_active;
        $advertisement->save();
        $advertisement->refresh();

        return $advertisement;
    }

    public function delete(Advertisement $advertisement): bool
    {
        return $advertisement->delete();
    }

    public function deleteAll(array $advertisements = []): bool
    {
        return Advertisement::when($advertisements, fn ($q) => $q->whereIn('id', $advertisements))->delete();
    }

    public function restore(Advertisement $advertisement): bool
    {
        return $advertisement->restore();
    }

    public function restoreAll(array $advertisements = []): bool
    {
        return Advertisement::when($advertisements, fn ($q) => $q->whereIn('id', $advertisements))->onlyTrashed()->restore();
    }

    public function deletePermanent(Advertisement $advertisement): bool
    {
        return $advertisement->forceDelete();
    }

    public function deletePermanentAll(array $advertisements = []): bool
    {
        return Advertisement::when($advertisements, fn ($q) => $q->whereIn('id', $advertisements))->onlyTrashed()->forceDelete();
    }
}
