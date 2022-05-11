<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterComponent extends Component
{
    public $menu_name = "Register";
    public $menu_icon = "fas fa-sign-in-alt";
    public $menu_slug = "register";
    public $menu_table = "user";

    public $username;
    public $password;
    public $remember;

    public function mount()
    {
        if (Auth::guard($this->menu_table)->check()) {
            Session::flash("success", trans("message.You already register"));
            return redirect()->route("index");
        }
    }

    public function rules()
    {
        return [
            "username" => "required|max:50|exists:{$this->menu_table},username",
            "password" => "required|max:50",
        ];
    }

    public function submit()
    {
        $this->validate();

        if (Auth::guard($this->menu_table)->attempt(["username" => $this->username, "password" => $this->password], $this->remember)) {
            Session::flash("success", trans("message.Register has been successfully"));
            return redirect()->intended("/");
        }

        return redirect()->back()->withInput()->withDanger(trans("message.Username or Password is invalid"));
    }

    public function render()
    {
        return view("livewire.{$this->menu_slug}.index")
            ->extends("layouts.app")->section("content");
    }
}
