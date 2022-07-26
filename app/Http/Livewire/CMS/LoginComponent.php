<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginComponent extends Component
{
    public $menu_name = 'Login';

    public $menu_icon = 'fas fa-sign-in-alt';

    public $menu_slug = 'login';

    public $menu_table = 'admin';

    public $username;

    public $password;

    public $remember;

    public function mount()
    {
        if (Auth::guard($this->menu_table)->check()) {
            Session::flash('success', trans('message.You already login'));

            return redirect()->route("{$this->sub_domain}.index");
        }
    }

    public function rules()
    {
        return [
            'username' => "required|max:50|exists:{$this->menu_table},username",
            'password' => 'required|max:50',
        ];
    }

    public function submit()
    {
        $this->validate();

        if (Auth::guard($this->menu_table)->attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            Session::flash('success', trans('message.Login has been successfully'));

            return redirect()->intended("{$this->sub_domain}/");
        }

        return redirect()->back()->withInput()->withDanger(trans('message.Username or Password is invalid'));
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index")
            ->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
