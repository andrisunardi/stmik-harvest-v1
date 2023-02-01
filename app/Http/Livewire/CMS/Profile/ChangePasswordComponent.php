<?php

namespace App\Http\Livewire\CMS\Profile;

use App\Http\Livewire\CMS\Component;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangePasswordComponent extends Component
{
    public function boot()
    {
        $this->pageName = 'Change Password';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-user-lock';
        $this->pageTable = 'users';
        $this->pageCategoryName = 'Profile';
        $this->pageCategoryTitle = trans('index.'.Str::snake($this->pageCategoryName));
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $current_password;

    public $new_password;

    public $confirm_password;

    public function resetForm()
    {
        $this->reset([
            'current_password',
            'new_password',
            'confirm_password',
        ]);

        $this->alert('info', trans('index.reset_form'));
    }

    public function rules()
    {
        return [
            'current_password' => 'required|max:50',
            'new_password' => 'required|max:50',
            'confirm_password' => 'required|max:50|same:new_password',
        ];
    }

    public function submit()
    {
        if (! Hash::check($this->current_password, Auth::user()->password)) {
            return $this->alert('error', trans('index.current_password_is_incorrect'));
        }

        if ($this->new_password != $this->confirm_password) {
            return $this->alert('error', trans('index.new_password_and_confirm_password_does_not_match'));
        }

        (new UserService())->changePassword(Auth::user(), $this->validate());

        $this->resetForm();
        $this->resetValidation();

        $this->alert('success', trans('index.password_has_been_successfully_changed'));
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}")
            ->extends("{$this->subDomain}.layouts.app")
            ->section('content');
    }
}
