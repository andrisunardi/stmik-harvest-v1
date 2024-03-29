<?php

namespace App\Http\Livewire;

use App\Models\AdmissionCalendar;
use App\Models\Banner;

class AdmissionCalendarComponent extends Component
{
    public function getBanner()
    {
        return Banner::find(8);
    }

    public function getAdmissionCalendars()
    {
        return AdmissionCalendar::active()->latest('id')->get();
    }

    public function render()
    {
        return view('livewire.admission-calendar.index', [
            'admissionCalendars' => $this->getAdmissionCalendars(),
        ])->extends('layouts.app', [
            'banner' => $this->getBanner(),
        ])->section('content');
    }
}
