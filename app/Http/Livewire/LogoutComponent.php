<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutComponent extends Component
{
    public function mount()
    {
        User::withoutEvents(function () {
            Auth::logout();
            Session::flush();
        });

        Session::flash('success', trans('index.you_have_been_successfully_logged_out'));

        return redirect()->route('login.index');
    }
}
