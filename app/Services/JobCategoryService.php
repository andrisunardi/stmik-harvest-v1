<?php

namespace App\Services;

use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobCategoryService
{
    public $table = 'job_categories';

    public function add(array $data = []): JobCategory
    {
        $data['code'] = Str::code('JBC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return JobCategory::create($data);
    }

    public function clone(array $data, JobCategory $jobCategory): JobCategory
    {
        $data['code'] = Str::code('JBC', $this->table, null, 7);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return JobCategory::create($data);
    }

    public function edit(JobCategory $jobCategory, $data): JobCategory
    {
        $jobCategory->update($data);
        $jobCategory->refresh();

        return $jobCategory;
    }

    public function active(JobCategory $jobCategory): JobCategory
    {
        $jobCategory->is_active = ! $jobCategory->is_active;
        $jobCategory->save();
        $jobCategory->refresh();

        return $jobCategory;
    }

    public function delete(JobCategory $jobCategory): bool
    {
        return $jobCategory->delete();
    }

    public function deleteAll(array $jobCategories = []): bool
    {
        return JobCategory::when($jobCategories, fn ($q) => $q->whereIn('id', $jobCategories))->delete();
    }

    public function restore(JobCategory $jobCategory): bool
    {
        return $jobCategory->restore();
    }

    public function restoreAll(array $jobCategories = []): bool
    {
        return JobCategory::when($jobCategories, fn ($q) => $q->whereIn('id', $jobCategories))->onlyTrashed()->restore();
    }

    public function deletePermanent(JobCategory $jobCategory): bool
    {
        return $jobCategory->forceDelete();
    }

    public function deletePermanentAll(array $jobCategories = []): bool
    {
        return JobCategory::when($jobCategories, fn ($q) => $q->whereIn('id', $jobCategories))->onlyTrashed()->forceDelete();
    }
}
