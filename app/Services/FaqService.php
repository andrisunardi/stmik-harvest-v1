<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Support\Facades\DB;

class FaqService
{
    public $table = 'faqs';

    public $slug = 'faq';

    public function add(array $data = []): Faq
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Faq::create($data);
    }

    public function clone(array $data, Faq $faq): Faq
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Faq::create($data);
    }

    public function edit(Faq $faq, $data): Faq
    {
        $faq->update($data);
        $faq->refresh();

        return $faq;
    }

    public function active(Faq $faq): Faq
    {
        $faq->is_active = ! $faq->is_active;
        $faq->save();
        $faq->refresh();

        return $faq;
    }

    public function delete(Faq $faq): bool
    {
        return $faq->delete();
    }

    public function deleteAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->delete();
    }

    public function restore(Faq $faq): bool
    {
        return $faq->restore();
    }

    public function restoreAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->onlyTrashed()->restore();
    }

    public function deletePermanent(Faq $faq): bool
    {
        return $faq->forceDelete();
    }

    public function deletePermanentAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->onlyTrashed()->forceDelete();
    }
}
