<?php

namespace App\Http\Livewire\CMS;

use App\Http\Livewire\CMS\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutComponent extends Component
{
    public $menu_name = "Logout";
    public $menu_icon = "fas fa-sign-out-alt";
    public $menu_slug = "logout";
    public $menu_table = "logout";

    public $listeners = ["logout"];

    public function logout()
    {
        Auth::logout();
        Session::flush();
        Session::flash("success", trans("message.You have been successfully logged out"));

        return redirect()->intended("{$this->sub_domain}/");
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index");
    }
}
