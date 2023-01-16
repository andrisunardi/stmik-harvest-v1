<?php

namespace App\Services;

use App\Models\Salary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SalaryService
{
    public $table = 'salaries';

    public $slug = 'salary';

    public function add(array $data = []): Salary
    {
        $data['code'] = Str::code('SALARY', $this->table, $data['date'], 5);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Salary::create($data);
    }

    public function clone(array $data, Salary $salary): Salary
    {
        $data['code'] = Str::code('SALARY', $this->table, $data['date'], 5);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $data['image'] = "{$data['code']}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($salary->checkImage()) {
                $data['image'] = "{$data['code']}.".explode('.', $salary->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$salary->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Salary::create($data);
    }

    public function edit(Salary $salary, $data): Salary
    {
        if ($salary->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('SALARY', $this->table, $data['date'], 5);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $image = $data['image'];

        if ($image) {
            $salary->deleteImage();

            $data['image'] = "{$salary->code}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $salary->update($data);
        $salary->refresh();

        return $salary;
    }

    public function active(Salary $salary): Salary
    {
        $salary->is_active = ! $salary->is_active;
        $salary->save();
        $salary->refresh();

        return $salary;
    }

    public function delete(Salary $salary): bool
    {
        return $salary->delete();
    }

    public function deleteAll(array $salaries = []): bool
    {
        return Salary::when($salaries, fn ($q) => $q->whereIn('id', $salaries))->delete();
    }

    public function restore(Salary $salary): bool
    {
        return $salary->restore();
    }

    public function restoreAll(array $salaries = []): bool
    {
        return Salary::when($salaries, fn ($q) => $q->whereIn('id', $salaries))->onlyTrashed()->restore();
    }

    public function deletePermanent(Salary $salary): bool
    {
        return $salary->forceDelete();
    }

    public function deletePermanentAll(array $salaries = []): bool
    {
        return Salary::when($salaries, fn ($q) => $q->whereIn('id', $salaries))->onlyTrashed()->forceDelete();
    }
}
