<?php

namespace App\Observers;

use App\Models\ProposalDocument;
use Illuminate\Support\Facades\Auth;

class ProposalDocumentObserver
{
    public function creating(ProposalDocument $proposalDocument)
    {
        $proposalDocument->created_by_id = Auth::user()->id;
        $proposalDocument->updated_by_id = Auth::user()->id;
    }

    public function created(ProposalDocument $proposalDocument)
    {
    }

    public function updating(ProposalDocument $proposalDocument)
    {
        $proposalDocument->updated_by_id = Auth::user()->id;
    }

    public function updated(ProposalDocument $proposalDocument)
    {
    }

    public function deleting(ProposalDocument $proposalDocument)
    {
        $proposalDocument->deleted_by_id = Auth::user()->id;
        $proposalDocument->save();
    }

    public function deleted(ProposalDocument $proposalDocument)
    {
    }

    public function restoring(ProposalDocument $proposalDocument)
    {
        $proposalDocument->deleted_by_id = null;
        $proposalDocument->save();
    }

    public function restored(ProposalDocument $proposalDocument)
    {
    }

    public function forceDeleted(ProposalDocument $proposalDocument)
    {
    }
}
