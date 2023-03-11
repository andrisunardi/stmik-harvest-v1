<?php

namespace App\Http\Livewire\CMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Login';
        $this->pageTitle = Str::translate($this->pageName);
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-sign-in-alt';
        $this->pageTable = 'users';
        $this->pageCategoryName = null;
        $this->pageCategoryTitle = null;
        $this->pageCategorySlug = null;
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $username;

    public $password;

    public $remember;

    public function mount()
    {
        if (Auth::check()) {
            $this->flash('info', trans('index.you_already_login'));

            return redirect()->route("{$this->subDomain}.index");
        }
    }

    public function rules()
    {
        return [
            'username' => "required|max:50|exists:{$this->pageTable},username",
            'password' => 'required|max:50',
        ];
    }

    public function submit()
    {
        $this->validate();

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            if (Auth::user()->hasAnyRole(config('app.cms_roles'))) {
                $this->flash('success', trans('index.login_has_been_successfully'));

                return redirect()->intended('cms');
            } else {
                Auth::logout();
                Session::flush();
            }
        }

        $this->alert('error', trans('index.username_or_password_is_invalid'));
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageSlug}.index")
            ->extends("{$this->subDomain}.layouts.app")
            ->section('content');
    }
}
