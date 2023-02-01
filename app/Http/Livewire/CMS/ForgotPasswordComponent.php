<?php

namespace App\Http\Livewire\CMS;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ForgotPasswordComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Forgot Password';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-question';
        $this->pageTable = 'users';
        $this->pageCategoryName = null;
        $this->pageCategoryTitle = null;
        $this->pageCategorySlug = null;
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $username;

    public $email;

    public $phone;

    public $confirm_reset;

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
            'email' => "required|max:50|email:rfc,dns|exists:{$this->pageTable},email",
            'phone' => "required|max:50|exists:{$this->pageTable},phone",
            'confirm_reset' => 'required|boolean|accepted:1',
        ];
    }

    public function submit()
    {
        $this->validate();

        $user = User::where('username', $this->username)
            ->where('email', $this->email)
            ->where('phone', $this->phone)
            ->role(config('app.cms_roles'))
            ->first();

        if (! $user) {
            return $this->alert('error', trans('index.username_or_email_or_phone_is_invalid'));
        }

        $password = (new UserService())->resetPassword($user);

        $this->flash('success', trans('validation.attributes.new_password')." : {$password}");

        return redirect()->route("{$this->subDomain}.login.index");
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageSlug}.index")
            ->extends("{$this->subDomain}.layouts.app")
            ->section('content');
    }
}
