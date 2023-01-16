<?php

namespace App\Services;

use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateService
{
    public $table = 'templates';

    public function add(array $data = []): Template
    {
        $data['code'] = Str::code('TEMPLATE', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Template::create($data);
    }

    public function clone(array $data, Template $template): Template
    {
        $data['code'] = Str::code('TEMPLATE', $this->table, $data['date'], 3);
        $data['datetime'] = "{$data['date']} {$data['time']}";

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Template::create($data);
    }

    public function edit(Template $template, $data): Template
    {
        if ($template->datetime?->format('Y-m-d') != $data['date']) {
            $data['code'] = Str::code('TEMPLATE', $this->table, $data['date'], 3);
        }

        $data['datetime'] = "{$data['date']} {$data['time']}";

        $template->update($data);
        $template->refresh();

        return $template;
    }

    public function active(Template $template): Template
    {
        $template->is_active = ! $template->is_active;
        $template->save();
        $template->refresh();

        return $template;
    }

    public function delete(Template $template): bool
    {
        return $template->delete();
    }

    public function deleteAll(array $templates = []): bool
    {
        return Template::when($templates, fn ($q) => $q->whereIn('id', $templates))->delete();
    }

    public function restore(Template $template): bool
    {
        return $template->restore();
    }

    public function restoreAll(array $templates = []): bool
    {
        return Template::when($templates, fn ($q) => $q->whereIn('id', $templates))->onlyTrashed()->restore();
    }

    public function deletePermanent(Template $template): bool
    {
        return $template->forceDelete();
    }

    public function deletePermanentAll(array $templates = []): bool
    {
        return Template::when($templates, fn ($q) => $q->whereIn('id', $templates))->onlyTrashed()->forceDelete();
    }
}
