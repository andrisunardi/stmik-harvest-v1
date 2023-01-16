<?php

namespace App\Services;

use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestimonialService
{
    public $table = 'testimonials';

    public function add(array $data = []): Testimonial
    {
        $data['code'] = Str::code('TESTMINOAL', $this->table, null, 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Testimonial::create($data);
    }

    public function clone(array $data, Testimonial $testimonial): Testimonial
    {
        $data['code'] = Str::code('TESTMINOAL', $this->table, null, 6);

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Testimonial::create($data);
    }

    public function edit(Testimonial $testimonial, $data): Testimonial
    {
        $testimonial->update($data);
        $testimonial->refresh();

        return $testimonial;
    }

    public function active(Testimonial $testimonial): Testimonial
    {
        $testimonial->is_active = ! $testimonial->is_active;
        $testimonial->save();
        $testimonial->refresh();

        return $testimonial;
    }

    public function delete(Testimonial $testimonial): bool
    {
        return $testimonial->delete();
    }

    public function deleteAll(array $testimonials = []): bool
    {
        return Testimonial::when($testimonials, fn ($q) => $q->whereIn('id', $testimonials))->delete();
    }

    public function restore(Testimonial $testimonial): bool
    {
        return $testimonial->restore();
    }

    public function restoreAll(array $testimonials = []): bool
    {
        return Testimonial::when($testimonials, fn ($q) => $q->whereIn('id', $testimonials))->onlyTrashed()->restore();
    }

    public function deletePermanent(Testimonial $testimonial): bool
    {
        return $testimonial->forceDelete();
    }

    public function deletePermanentAll(array $testimonials = []): bool
    {
        return Testimonial::when($testimonials, fn ($q) => $q->whereIn('id', $testimonials))->onlyTrashed()->forceDelete();
    }
}
