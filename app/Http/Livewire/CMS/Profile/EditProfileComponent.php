<?php

namespace App\Http\Livewire\CMS\Profile;

use App\Http\Livewire\CMS\Component;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EditProfileComponent extends Component
{
    public $pageName;

    public $pageTitle;

    public $pageSlug;

    public $pageIcon;

    public $pageTable;

    public $pageCategoryName;

    public $pageCategoryTitle;

    public $pageCategorySlug;

    public $pageSubCategoryName;

    public $pageSubCategoryTitle;

    public $pageSubCategorySlug;

    public function boot()
    {
        $this->pageName = 'Edit Profile';
        $this->pageTitle = trans('index.'.Str::snake($this->pageName));
        $this->pageSlug = Str::slug($this->pageName);
        $this->pageIcon = 'fas fa-user-edit';
        $this->pageTable = 'users';
        $this->pageCategoryName = 'Profile';
        $this->pageCategoryTitle = trans('index.'.Str::snake($this->pageCategoryName));
        $this->pageCategorySlug = Str::slug($this->pageCategoryName);
        $this->pageSubCategoryName = null;
        $this->pageSubCategoryTitle = null;
        $this->pageSubCategorySlug = null;
    }

    public $name;

    public $username;

    public $email;

    public $phone;

    public $queryString = [
        'name' => ['except' => ''],
        'username' => ['except' => ''],
        'email' => ['except' => ''],
        'phone' => ['except' => ''],
    ];

    public function resetForm()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;

        $this->alert('info', trans('index.reset_form'));
    }

    public function mount()
    {
        $this->resetForm();
    }

    public function rules()
    {
        return [
            'name' => "required|max:50|unique:{$this->pageTable},name,".Auth::user()->id,
            'username' => "required|max:50|unique:{$this->pageTable},username,".Auth::user()->id,
            'email' => "required|max:50|unique:{$this->pageTable},email,".Auth::user()->id,
            'phone' => "required|max:20|unique:{$this->pageTable},phone,".Auth::user()->id,
        ];
    }

    public function submit()
    {
        (new UserService())->editProfile(Auth::user(), $this->validate());

        $this->resetForm();
        $this->resetValidation();

        $this->alert('success', trans('index.your_profile_has_been_successfully_updated'));
    }

    public function render()
    {
        return view("{$this->subDomain}.livewire.{$this->pageCategorySlug}.{$this->pageSlug}")
            ->extends("{$this->subDomain}.layouts.app")
            ->section('content');
    }
}
