<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobService
{
    public $table = 'jobs';

    public function add(array $data = []): Job
    {
        $data['code'] = Str::code('JOB', $this->table, now()->format('Y-m-d'), 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Job::create($data);
    }

    public function clone(array $data, Job $job): Job
    {
        $data['code'] = Str::code('JOB', $this->table, now()->format('Y-m-d'), 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Job::create($data);
    }

    public function edit(Job $job, $data): Job
    {
        $job->update($data);
        $job->refresh();

        return $job;
    }

    public function active(Job $job): Job
    {
        $job->is_active = ! $job->is_active;
        $job->save();
        $job->refresh();

        return $job;
    }

    public function delete(Job $job): bool
    {
        return $job->delete();
    }

    public function deleteAll(array $jobs = []): bool
    {
        return Job::when($jobs, fn ($q) => $q->whereIn('id', $jobs))->delete();
    }

    public function restore(Job $job): bool
    {
        return $job->restore();
    }

    public function restoreAll(array $jobs = []): bool
    {
        return Job::when($jobs, fn ($q) => $q->whereIn('id', $jobs))->onlyTrashed()->restore();
    }

    public function deletePermanent(Job $job): bool
    {
        return $job->forceDelete();
    }

    public function deletePermanentAll(array $jobs = []): bool
    {
        return Job::when($jobs, fn ($q) => $q->whereIn('id', $jobs))->onlyTrashed()->forceDelete();
    }
}
