<?php

namespace App\Services;

use App\Models\ProposalDocument;
use Illuminate\Support\Facades\DB;

class ProposalDocumentService
{
    public $table = 'proposal_documents';

    public function add(array $data = []): ProposalDocument
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ProposalDocument::create($data);
    }

    public function clone(array $data, ProposalDocument $proposalDocument): ProposalDocument
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return ProposalDocument::create($data);
    }

    public function edit(ProposalDocument $proposalDocument, $data): ProposalDocument
    {
        $proposalDocument->update($data);
        $proposalDocument->refresh();

        return $proposalDocument;
    }

    public function active(ProposalDocument $proposalDocument): ProposalDocument
    {
        $proposalDocument->is_active = ! $proposalDocument->is_active;
        $proposalDocument->save();
        $proposalDocument->refresh();

        return $proposalDocument;
    }

    public function delete(ProposalDocument $proposalDocument): bool
    {
        return $proposalDocument->delete();
    }

    public function deleteAll(array $proposalDocuments = []): bool
    {
        return ProposalDocument::when($proposalDocuments, fn ($q) => $q->whereIn('id', $proposalDocuments))->delete();
    }

    public function restore(ProposalDocument $proposalDocument): bool
    {
        return $proposalDocument->restore();
    }

    public function restoreAll(array $proposalDocuments = []): bool
    {
        return ProposalDocument::when($proposalDocuments, fn ($q) => $q->whereIn('id', $proposalDocuments))->onlyTrashed()->restore();
    }

    public function deletePermanent(ProposalDocument $proposalDocument): bool
    {
        return $proposalDocument->forceDelete();
    }

    public function deletePermanentAll(array $proposalDocuments = []): bool
    {
        return ProposalDocument::when($proposalDocuments, fn ($q) => $q->whereIn('id', $proposalDocuments))->onlyTrashed()->forceDelete();
    }
}
