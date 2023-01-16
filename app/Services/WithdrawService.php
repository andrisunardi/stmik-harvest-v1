<?php

namespace App\Services;

use App\Models\Withdraw;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WithdrawService
{
    public $table = 'withdraws';

    public $slug = 'withdraw';

    public function add(array $data = []): Withdraw
    {
        $data['code'] = Str::code('WD', $this->table, $data['date'], 5);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Withdraw::create($data);
    }

    public function clone(array $data, Withdraw $withdraw): Withdraw
    {
        $data['code'] = Str::code('WD', $this->table, $data['date'], 5);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($withdraw->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $withdraw->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$withdraw->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Withdraw::create($data);
    }

    public function edit(Withdraw $withdraw, $data): Withdraw
    {
        if ($withdraw->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('WD', $this->table, $data['date'], 5);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $withdraw->deleteImage();

            $data['image'] = "{$withdraw->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $withdraw->update($data);
        $withdraw->refresh();

        return $withdraw;
    }

    public function active(Withdraw $withdraw): Withdraw
    {
        $withdraw->is_active = ! $withdraw->is_active;
        $withdraw->save();
        $withdraw->refresh();

        return $withdraw;
    }

    public function delete(Withdraw $withdraw): bool
    {
        return $withdraw->delete();
    }

    public function deleteAll(array $withdraws = []): bool
    {
        return Withdraw::when($withdraws, fn ($q) => $q->whereIn('id', $withdraws))->delete();
    }

    public function restore(Withdraw $withdraw): bool
    {
        return $withdraw->restore();
    }

    public function restoreAll(array $withdraws = []): bool
    {
        return Withdraw::when($withdraws, fn ($q) => $q->whereIn('id', $withdraws))->onlyTrashed()->restore();
    }

    public function deletePermanent(Withdraw $withdraw): bool
    {
        $withdraw->deleteImage();

        return $withdraw->forceDelete();
    }

    public function deletePermanentAll(array $withdraws = []): bool
    {
        $withdraws = Withdraw::when($withdraws, fn ($q) => $q->whereIn('id', $withdraws))->onlyTrashed()->get();

        foreach ($withdraws as $withdraw) {
            $withdraw->deleteImage();
            $withdraw->forceDelete();
        }

        return true;
    }
}
