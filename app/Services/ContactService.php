<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public $table = 'contacts';

    public $slug = 'contact';

    public function add(array $data = []): Contact
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Contact::create($data);
    }

    public function clone(array $data, Contact $contact): Contact
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Contact::create($data);
    }

    public function edit(Contact $contact, $data): Contact
    {
        $contact->update($data);
        $contact->refresh();

        return $contact;
    }

    public function active(Contact $contact): Contact
    {
        $contact->is_active = ! $contact->is_active;
        $contact->save();
        $contact->refresh();

        return $contact;
    }

    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }

    public function deleteAll(array $contacts = []): bool
    {
        return Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->delete();
    }

    public function restore(Contact $contact): bool
    {
        return $contact->restore();
    }

    public function restoreAll(array $contacts = []): bool
    {
        return Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->onlyTrashed()->restore();
    }

    public function deletePermanent(Contact $contact): bool
    {
        return $contact->forceDelete();
    }

    public function deletePermanentAll(array $contacts = []): bool
    {
        return Contact::when($contacts, fn ($q) => $q->whereIn('id', $contacts))->onlyTrashed()->forceDelete();
    }
}
