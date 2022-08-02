<?php

namespace App\Http\Livewire\CMS;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ForgotPasswordComponent extends Component
{
    public $menu_name = 'Forgot Password';

    public $menu_icon = 'fas fa-question';

    public $menu_slug = 'forgot-password';

    public $menu_table = 'admin';

    public $username;

    public $email;

    public $confirm_reset;

    public function mount()
    {
        if (Auth::guard($this->menu_table)->check()) {
            Session::flash('success', trans('index.You already login'));

            return redirect()->route("{$this->sub_domain}.index");
        }
    }

    public function rules()
    {
        return [
            'username' => "required|max:50|exists:{$this->menu_table},username",
            'email' => "required|max:50|email|exists:{$this->menu_table},email",
            'confirm_reset' => 'required',
        ];
    }

    public function submit()
    {
        $this->validate();

        $admin = Admin::where('username', $this->username)->where('email', $this->email)->first();

        if (! $admin) {
            return redirect()->back()->withInput()->withDanger(trans('index.Username or Email is invalid'));
        }

        $password = Str::random(5);
        $admin->password = Hash::make($password);
        $admin->save();

        Session::flash('success', trans('index.New Password')." :  $password");

        return redirect()->route("{$this->sub_domain}.login.index");
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index")
            ->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
