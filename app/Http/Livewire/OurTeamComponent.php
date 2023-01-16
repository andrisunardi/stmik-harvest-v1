<?php

namespace App\Http\Livewire;

use App\Models\User;

class OurTeamComponent extends Component
{
    public function getTeams()
    {
        return User::with('access')
            ->whereIn('access_id', ['1', '2', '3', '4', '5', '6'])
            ->where('id', '!=', '10')
            ->active()
            ->orderBy('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.our-team.index', [
            'teams' => $this->getTeams(),
        ])->extends('layouts.app')->section('content');
    }
}
