<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutComponent extends Component
{
    public function mount()
    {
        Auth::logout();
        Session::flush();

        $this->flash('success', trans('index.you_have_been_successfully_logged_out'));

        return redirect()->route("{$this->subDomain}.login.index");
    }
}
