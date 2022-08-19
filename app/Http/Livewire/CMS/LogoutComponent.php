<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutComponent extends Component
{
    public $menu_name = 'Logout';

    public $menu_icon = 'fas fa-sign-out-alt';

    public $menu_slug = 'logout';

    public $menu_table = 'admin';

    public function mount()
    {
        Auth::logout();
        Session::flush();
        Session::flash('success', trans('index.you_have_been_successfully_logged_out'));

        return redirect()->route("{$this->sub_domain}.login.index");
    }
}
