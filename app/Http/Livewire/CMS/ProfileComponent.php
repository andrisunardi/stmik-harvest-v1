<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileComponent extends Component
{
    public $menu_name = 'Profile';

    public $menu_icon = 'bi bi-person-circle';

    public $menu_slug = 'profile';

    public $menu_table = 'admin';

    public $menu_type = 'index';

    public $access;

    public $name;

    public $email;

    public $username;

    public $password;

    public $image;

    public $current_password;

    public $new_password;

    public $confirm_password;

    public $queryString = [
        'menu_type' => ['except' => 'index'],
    ];

    public function resetFilter()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->username = Auth::user()->username;

        $this->reset([
            'current_password',
            'new_password',
            'confirm_password',
        ]);
    }

    public function refresh()
    {
        $this->resetErrorBag();
    }

    public function updated()
    {
        if ($this->menu_type == 'edit-profile') {
            $this->validate([
                'name' => "required|max:50|unique:{$this->menu_table},name,".Auth::user()->id,
                'email' => "required|email|max:50|unique:{$this->menu_table},email,".Auth::user()->id,
                'username' => "required|max:50|unique:{$this->menu_table},username,".Auth::user()->id,
                'image' => 'nullable|file|mimes:jpg,png,jpeg,gif,webp|max:2048',
            ]);
        }

        if ($this->menu_type == 'change-password') {
            $this->validate([
                'current_password' => 'required|max:50|current_password',
                'new_password' => 'required|max:50',
                'confirm_password' => 'required|max:50|same:new_password',
            ]);
        }
    }

    public function mount()
    {
        $this->access = Auth::user()->access;
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->username = Auth::user()->username;
        $this->active = Auth::user()->active;
    }

    public function index()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'index';
    }

    public function editProfile()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'edit-profile';
    }

    public function editProfileSubmit()
    {
        $this->validate([
            'name' => "required|max:50|unique:{$this->menu_table},name,".Auth::user()->id,
            'email' => "required|email|max:50|unique:{$this->menu_table},email,".Auth::user()->id,
            'username' => "required|max:50|unique:{$this->menu_table},username,".Auth::user()->id,
            'image' => 'nullable|file|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        Auth::user()->name = $this->name;
        Auth::user()->email = $this->email;
        Auth::user()->username = $this->username;
        Auth::user()->save();
        Auth::user()->refresh();

        $this->resetFilter();
        $this->resetErrorBag();

        return Session::flash('success', trans('message.Your Profile has been Edited Successfully'));
    }

    public function changePassword()
    {
        $this->resetFilter();
        $this->resetErrorBag();

        $this->menu_type = 'change-password';
    }

    public function changePasswordSubmit()
    {
        $this->validate([
            'current_password' => 'required|max:50',
            'new_password' => 'required|max:50',
            'confirm_password' => 'required|max:50|same:new_password',
        ]);

        if ($this->new_password != $this->confirm_password) {
            return Session::flash('danger', trans('message.New Password and Confirm Password does not match'));
        }

        if (! Hash::check($this->current_password, Auth::user()->password)) {
            return Session::flash('danger', trans('message.Your Current Password is incorrect'));
        }

        Auth::user()->password = Hash::make($this->new_password);
        Auth::user()->save();
        Auth::user()->refresh();

        $this->resetFilter();
        $this->resetErrorBag();

        return Session::flash('success', trans('message.Your Password has been Changed Successfully'));
    }

    public function render()
    {
        return view("{$this->sub_domain}.livewire.{$this->menu_slug}.index")
            ->extends("{$this->sub_domain}.layouts.app")->section('content');
    }
}
