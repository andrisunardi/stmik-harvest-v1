<?php

namespace App\Http\Livewire;

use App\Models\ProposalDocument;

class ProposalDocumentComponent extends Component
{
    public function getProposalDocument()
    {
        return ProposalDocument::active()->latest('id')->first();
    }

    public function render()
    {
        return view('livewire.proposal-document.index', [
            'proposalDocument' => $this->getProposalDocument(),
        ])->extends('layouts.app')->section('content');
    }
}
