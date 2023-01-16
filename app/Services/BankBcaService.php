<?php

namespace App\Services;

use App\Models\BankBca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BankBcaService
{
    public $table = 'bank_bcas';

    public $slug = 'bank-bca';

    public function add(array $data = []): BankBca
    {
        $data['code'] = Str::code('BANKBCA', $this->table, null, 3);

        $file = $data['file'];

        if ($file) {
            $data['file'] = "{$data['code']}.{$file->getClientOriginalExtension()}";
            $file->storePubliclyAs($this->slug, $data['file'], 'files');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BankBca::create($data);
    }

    public function clone($data, BankBca $bankBca): BankBca
    {
        $data['code'] = Str::code('BANKBCA', $this->table, null, 3);

        $file = $data['file'];

        if ($file) {
            $data['file'] = "{$data['code']}.{$file->getClientOriginalExtension()}";
            $file->storePubliclyAs($this->slug, $data['file'], 'files');
        } else {
            if ($bankBca->checkFile()) {
                $data['file'] = "{$data['code']}.".explode('.', $bankBca->file)[1];

                File::copy(
                    public_path("files/{$this->slug}/{$bankBca->file}"),
                    public_path("files/{$this->slug}/{$data['file']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return BankBca::create($data);
    }

    public function edit(BankBca $bankBca, $data): BankBca
    {
        $file = $data['file'];

        if ($file) {
            $bankBca->deleteFile();

            $data['file'] = "{$bankBca->code}.{$file->getClientOriginalExtension()}";
            $file->storePubliclyAs($this->slug, $data['file'], 'files');
        } else {
            unset($data['file']);
        }

        $bankBca->update($data);
        $bankBca->refresh();

        return $bankBca;
    }

    public function active(BankBca $bankBca): BankBca
    {
        $bankBca->is_active = ! $bankBca->is_active;
        $bankBca->save();
        $bankBca->refresh();

        return $bankBca;
    }

    public function delete(BankBca $bankBca): bool
    {
        return $bankBca->delete();
    }

    public function deleteAll(array $bankBcas = []): bool
    {
        return BankBca::when($bankBcas, fn ($q) => $q->whereIn('id', $bankBcas))->delete();
    }

    public function restore(BankBca $bankBca): bool
    {
        return $bankBca->restore();
    }

    public function restoreAll(array $bankBcas = []): bool
    {
        return BankBca::when($bankBcas, fn ($q) => $q->whereIn('id', $bankBcas))->onlyTrashed()->restore();
    }

    public function deletePermanent(BankBca $bankBca): bool
    {
        $bankBca->deleteFile();

        return $bankBca->forceDelete();
    }

    public function deletePermanentAll(array $bankBcas = []): bool
    {
        $bankBcas = BankBca::when($bankBcas, fn ($q) => $q->whereIn('id', $bankBcas))->onlyTrashed()->get();

        foreach ($bankBcas as $bankBca) {
            $bankBca->deleteFile();
            $bankBca->forceDelete();
        }

        return true;
    }
}
